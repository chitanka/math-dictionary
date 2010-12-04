<?php
/**
	Escape meta-characters used in regular expressions
*/
function prepare_string_for_preg($string)
{
	return strtr($string, array(
		'/' => '\/',
		// in a regexp a backslash can be escaped with four backslashes - \\\\
		'\\' => '\\\\\\\\',
		'^' => '\^',
		'$' => '\$',
		'.' => '\.',
		'[' => '\[',
		']' => '\]',
		'|' => '\|',
		'(' => '\(',
		')' => '\)',
		'?' => '\?',
		'*' => '\*',
		'+' => '\+',
		'{' => '\{',
		'}' => '\}',
		'-' => '\-',
	));
}

/**
	Prepare a string to be used as a document title
*/
function prepare_document_title($title)
{
	$title = strtr($title, array(
		'<br />' => ' — ',
	));
	$title = strip_tags($title);

	return $title;
}


/**
	Create alphabet navigational links.

	@param $route     Route name
	@param $letter    Currently selected letter by user
	@param $params    Extra query parameters
*/
function navi_alpha_links
	($route, $letter, $lang, $params = array())
{
	$items = array();

	foreach ( get_alphabet_for($lang) as $vletter ) {
		$items[] = navi_alpha_link($route, $letter, $vletter, $vletter, $params);
	}

	$items[] = navi_alpha_link($route, $letter, '-', __('All'), $params);

	return sprintf('<ul role="navigation">%s</ul>', implode("\n", $items));
}

/**
	@see navi_alpha_links()
*/
function navi_alpha_link
	($route, $selected_letter, $view_letter, $text, $params = array())
{
	if ( $selected_letter == $view_letter ) {
		return sprintf('<li class="selected">%s</li>', $text);
	}

	$aparams = array('letter' => $view_letter) + $params;
	$link = link_to($text, $route .'?'. http_build_query($aparams));

	return sprintf('<li>%s</li>', $link);
}

function get_alphabet_for($lang)
{
	return explode(' ', sfConfig::get(sprintf('app_%s_alphabet', $lang)));
}

function get_title_for_letter_list($letter, $first_lang, $second_lang)
{
	$dict = get_dictionary_title($first_lang, $second_lang);

	if (empty($letter)) {
		return $dict;
	}

	return __('%dictionary% — %letter%', array(
		'%dictionary%' => $dict,
		'%letter%'     => ($letter == '-' ? __('All') : '<span class="letter">'.$letter.'</span>'),
	));
}


function get_dictionary_title($first_lang, $second_lang)
{
	return __('%lang1%—%lang2%', array(
		'%lang1%' => get_formatted_language($first_lang),
		'%lang2%' => get_formatted_language($second_lang),
	));
}

function get_formatted_language($lang)
{
	return '<span class="lang">' . format_language($lang) . '</span>';
}

function link_to_dict($first_lang, $second_lang)
{
	$dict = $first_lang . '-' . $second_lang;
	$letter = '';
	$text = get_dictionary_title($first_lang, $second_lang);

	return link_to($text, '@main_list_index?'. http_build_query(compact('dict')));
}


function link_to_wikipedia($lang, $article, $text = '')
{
	if ($text == '') {
		$text = $article;
	}

	return sprintf('<a href="http://%s.wikipedia.org/wiki/%s" class="wp">%s</a>',
		$lang, urlencode(str_replace(' ', '_', $article)), $text);
}


/**
	Highlight a substring in a string.

	@param string $haystack  The base string
	@param string $hilite    The substring to highlight
*/
function hilite($haystack, $hilite)
{
	if ($hilite == '') {
		return $haystack;
	}

	$re = '/' . prepare_string_for_preg($hilite) . '/ui';
	return preg_replace($re, '<span class="hilite">$0</span>', $haystack);
}

function redirect_search(form)
{
	// FIXME
	if ( /[\/.]/.test(form.q.value) ) {
		// a slash creates encoding problems (double encoding/decoding needed)
		return true;
	}
	location.href = form.action + "/" + encodeURIComponent(form.q.value);
	return false;
}

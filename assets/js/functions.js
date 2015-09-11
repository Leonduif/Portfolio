function isTouch() {
	return 'ontouchstart' in window || 'onmsgesturechange' in window;
}
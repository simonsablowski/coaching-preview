function MotivadoPlayer(config) {
	if (config.product == undefined && config.objectSequence == undefined) {
		return alert('Missing required parameters!');
	}
	
	var flashvars = config;
	flashvars.baseServiceUrl = config.baseServiceUrl;
	flashvars.baseVideoUrl = config.baseVideoUrl || config.baseServiceUrl + 'videos/';
	flashvars.baseAssetUrl = config.baseAssetUrl || config.baseServiceUrl + 'assets/';
	flashvars.skin = config.skin || undefined;
	flashvars.autoPlay = config.autoPlay || 'true';
	flashvars.debugMode = config.debugMode || 'false';
	flashvars.localMode = config.localMode || 'false';
	flashvars.objectSequence = config.objectSequence || undefined;
	
	jQuery('#' + (config.element || 'MotivadoPlayer')).flash({
		swf: (config.basePlayerUrl || config.baseServiceUrl + 'player/') + (config.player || 'CoachingPlayer.swf'),
		width: config.width || 960,
		height: config.height || 350,
		flashvars: flashvars
	});
}

function trackPageLoadTime() {
	return true;
}

function trackPage() {
	return true;
}

function endCoaching() {
	return true;
}
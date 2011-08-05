function MotivadoPlayer(config) {
	if (config.product == undefined && config.objectSequence == undefined) {
		return alert('Missing required parameters!');
	}
	
	jQuery('#' + (config.element || 'MotivadoPlayer')).flash({
		swf: (config.basePlayerUrl || config.baseServiceUrl + 'player/') + (config.player || 'CoachingPlayer.swf'),
		width: config.width || 960,
		height: config.height || 350,
		flashvars: {
			product: config.product,
			baseServiceUrl: config.baseServiceUrl,
			baseVideoUrl: config.baseVideoUrl || config.baseServiceUrl + 'videos/',
			baseAssetUrl: config.baseAssetUrl || config.baseServiceUrl + 'player/assets/',
			autoPlay: config.autoPlay || 'true',
			debugMode: config.debugMode || 'false',
			localMode: config.localMode || 'false',
			objectSequence: config.objectSequence || null
		}
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
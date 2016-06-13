;(function(window) {

	'use strict';

	// taken from mo.js demos
	function isIOSSafari() {
		var userAgent;
		userAgent = window.navigator.userAgent;
		return userAgent.match(/iPad/i) || userAgent.match(/iPhone/i);
	};

	// taken from mo.js demos
	function isTouch() {
		var isIETouch;
		isIETouch = navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
		return [].indexOf.call(window, 'ontouchstart') >= 0 || isIETouch;
	};
	
	// taken from mo.js demos
	var isIOS = isIOSSafari(),
		clickHandler = isIOS || isTouch() ? 'touchstart' : 'click';

	function extend( a, b ) {
		for( var key in b ) { 
			if( b.hasOwnProperty( key ) ) {
				a[key] = b[key];
			}
		}
		return a;
	}

	function Animocon(el, options) {
		this.el = el;
		this.options = extend( {}, this.options );
		extend( this.options, options );

		this.checked = false;

		this.timeline = new mojs.Timeline();
		
		for(var i = 0, len = this.options.tweens.length; i < len; ++i) {
			this.timeline.add(this.options.tweens[i]);
		}

		var self = this;
		this.el.addEventListener(clickHandler, function() {
			if( self.checked ) {
				self.options.onUnCheck();
			}
			else {
				self.options.onCheck();
				self.timeline.start();
			}
			self.checked = !self.checked;
		});
	}

	Animocon.prototype.options = {
		tweens : [
			new mojs.Burst({
				shape : 'circle',
				isRunLess: true
			})
		],
		onCheck : function() { return false; },
		onUnCheck : function() { return false; }
	};

	// grid items:
	var items = [].slice.call(document.querySelectorAll('.like > .like__item'));

	function init() {
		/* Icon 7 */
		var el7 = items[0].querySelector('button.icobutton'), el7span = el7.querySelector('span');
		new Animocon(el7, {
			tweens : [
				// burst animation
				new mojs.Burst({
					parent: el7,
					duration: 1200,
					delay: 200,
					shape : 'circle',
					fill: '#988ADE',
					x: '50%',
					y: '50%',
					opacity: 0.6,
					childOptions: { radius: {'rand(20,5)':0} },
					radius: {90:150},
					count: 18,
					isSwirl: true,
					swirlSize: 15,
					isRunLess: true,
					easing: mojs.easing.bezier(0.1, 1, 0.3, 1)
				}),
				// ring animation
				new mojs.Transit({
					parent: el7,
					duration: 1500,
					type: 'circle',
					radius: {30: 100},
					fill: 'transparent',
					stroke: '#988ADE',
					strokeWidth: {30:0},
					opacity: 0.6,
					x: '50%',     
					y: '50%',
					isRunLess: true,
					easing: mojs.easing.bezier(0.1, 1, 0.3, 1)
				}),
				new mojs.Transit({
					parent: el7,
					duration: 1600,
					delay: 320,
					type: 'circle',
					radius: {30: 80},
					fill: 'transparent',
					stroke: '#988ADE',
					strokeWidth: {20:0},
					opacity: 0.3,
					x: '50%',     
					y: '50%',
					isRunLess: true,
					easing: mojs.easing.bezier(0.1, 1, 0.3, 1)
				}),
				// icon scale animation
				new mojs.Tween({
					duration : 1000,
					onUpdate: function(progress) {
						if(progress > 0.3) {
							var elasticOutProgress = mojs.easing.elastic.out(1.43*progress-0.43);
							el7span.style.WebkitTransform = el7span.style.transform = 'scale3d(' + elasticOutProgress + ',' + elasticOutProgress + ',1)';
						}
						else {
							el7span.style.WebkitTransform = el7span.style.transform = 'scale3d(0,0,1)';
						}
					}
				})
			],
			onCheck : function() {
				el7.style.color = '#988ADE';
			},
			onUnCheck : function() {
				el7.style.color = '#C0C1C3';	
			}
		});
		/* Icon 7 */

		/* Icon 16 */
		var el16 = items[1].querySelector('button.icobutton'), el16span = el16.querySelector('span');
		var opacityCurve16 = mojs.easing.path('M0,0 L25.333,0 L75.333,100 L100,0');
		var translationCurve16 = mojs.easing.path('M0,100h25.3c0,0,6.5-37.3,15-56c12.3-27,35-44,35-44v150c0,0-1.1-12.2,9.7-33.3c9.7-19,15-22.9,15-22.9');
		var squashCurve16 = mojs.easing.path('M0,100.004963 C0,100.004963 25,147.596355 25,100.004961 C25,70.7741867 32.2461944,85.3230873 58.484375,94.8579105 C68.9280825,98.6531013 83.2611815,99.9999999 100,100');
		new Animocon(el16, {
			tweens : [
				// burst animation (circles)
				new mojs.Burst({
					parent: el16,
					duration: 1700,
					delay: 350,
					shape : 'circle',
					fill: '#FF6767',
					x: '50%',
					y: '50%',
					opacity: 0.3,
					childOptions: { radius: {'rand(15,5)':0} },
					radius: {0:150},
					degree: 50,
					angle: -25,
					count: 6,
					isRunLess: true,
					easing: mojs.easing.bezier(0.1, 1, 0.3, 1)
				}),
				// burst animation (line1)
				new mojs.Burst({
					parent: el16,
					duration: 600,
					delay: 200,
					shape : 'circle',
					fill: '#C0C1C3',
					x: '20%',
					y: '100%',
					childOptions: { 
						radius: {60:0},
						type: 'line',
						stroke: '#FF6767',
						strokeWidth: 2,
						strokeLinecap: 'round'
					},
					radius: {50:180},
					angle: 180,
					count: 1,
					opacity: 0.4,
					isRunLess: true,
					easing: mojs.easing.bezier(0.1, 1, 0.3, 1)
				}),
				// burst animation (line2)
				new mojs.Burst({
					parent: el16,
					duration: 600,
					delay: 200,
					shape : 'circle',
					fill: '#C0C1C3',
					x: '50%',
					y: '100%',
					childOptions: { 
						radius: {60:0},
						type: 'line',
						stroke: '#FF6767',
						strokeWidth: 2,
						strokeLinecap: 'round'
					},
					radius: {50:220},
					angle: 180,
					count: 1,
					opacity: 0.4,
					isRunLess: true,
					easing: mojs.easing.bezier(0.1, 1, 0.3, 1)
				}),
				// burst animation (line3)
				new mojs.Burst({
					parent: el16,
					duration: 600,
					delay: 200,
					shape : 'circle',
					fill: '#C0C1C3',
					x: '80%',
					y: '100%',
					childOptions: { 
						radius: {60:0},
						type: 'line',
						stroke: '#FF6767',
						strokeWidth: 2,
						strokeLinecap: 'round'
					},
					radius: {50:180},
					angle: 180,
					count: 1,
					opacity: 0.4,
					isRunLess: true,
					easing: mojs.easing.bezier(0.1, 1, 0.3, 1)
				}),
				// icon scale animation
				new mojs.Tween({
					duration : 500,
					onUpdate: function(progress) {
						var translateProgress = translationCurve16(progress),
							squashProgress = squashCurve16(progress),
							scaleX = 1 - 2*squashProgress,
							scaleY = 1 + 2*squashProgress;

						el16span.style.WebkitTransform = el16span.style.transform = 'translate3d(0,' + -180*translateProgress + 'px,0) scale3d(' + scaleX + ',' + scaleY + ',1)';

						var opacityProgress = opacityCurve16(progress);
						el16span.style.opacity = opacityProgress;

						el16.style.color = progress >= 0.75 ? '#FF6767' : '#C0C1C3';
					}
				})
			],
			onUnCheck : function() {
				el16.style.color = '#C0C1C3';
			}
		});
		/* Icon 16 */
		
		// bursts when hovering the mo.js link
		var molinkEl = document.querySelector('.special-link'),
			moTimeline = new mojs.Timeline(),
			moburst1 = new mojs.Burst({
				parent: molinkEl,
				duration: 1300,
				shape : 'circle',
				fill : [ '#988ADE', '#DE8AA0', '#8AAEDE', '#8ADEAD', '#DEC58A', '#8AD1DE' ],
				x: '0%',
				y: '-50%',
				radius: {0:60},
				count: 6,
				isRunLess: true,
				easing: mojs.easing.bezier(0.1, 1, 0.3, 1)
			}),
			moburst2 = new mojs.Burst({
				parent: molinkEl,
				duration: 1600,
				delay: 100,
				shape : 'circle',
				fill : [ '#988ADE', '#DE8AA0', '#8AAEDE', '#8ADEAD', '#DEC58A', '#8AD1DE' ],
				x: '-100%',
				y: '-20%',
				radius: {0:120},
				count: 14,
				isRunLess: true,
				easing: mojs.easing.bezier(0.1, 1, 0.3, 1)
			}),
			moburst3 = new mojs.Burst({
				parent: molinkEl,
				duration: 1500,
				delay: 200,
				shape : 'circle',
				fill : [ '#988ADE', '#DE8AA0', '#8AAEDE', '#8ADEAD', '#DEC58A', '#8AD1DE' ],
				x: '130%',
				y: '-70%',
				radius: {0:90},
				count: 8,
				isRunLess: true,
				easing: mojs.easing.bezier(0.1, 1, 0.3, 1)
			}),
			moburst4 = new mojs.Burst({
				parent: molinkEl,
				duration: 2000,
				delay: 300,
				shape : 'circle',
				fill : [ '#988ADE', '#DE8AA0', '#8AAEDE', '#8ADEAD', '#DEC58A', '#8AD1DE' ],
				x: '-20%',
				y: '-150%',
				radius: {0:60},
				count: 14,
				isRunLess: true,
				easing: mojs.easing.bezier(0.1, 1, 0.3, 1)
			}),
			moburst5 = new mojs.Burst({
				parent: molinkEl,
				duration: 1400,
				delay: 400,
				shape : 'circle',
				fill : [ '#988ADE', '#DE8AA0', '#8AAEDE', '#8ADEAD', '#DEC58A', '#8AD1DE' ],
				x: '30%',
				y: '-100%',
				radius: {0:60},
				count: 12,
				isRunLess: true,
				easing: mojs.easing.bezier(0.1, 1, 0.3, 1)
			});

		moTimeline.add(moburst1, moburst2, moburst3, moburst4, moburst5);
		molinkEl.addEventListener('mouseenter', function() {
			moTimeline.start();
		});
	}
	
	init();

})(window);
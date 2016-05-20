function editCan(can, img) {
	editCanvas = {
		drawer: {
			canvas: null,
			ctx: null,
			img: null,
			lineWidth: 1,
			color: 'black',
			isDrawing: false,

			init: function (canvas, image) {
				me = this;

				if (typeof canvas === "string") {
					me.canvas = document.getElementById(canvas);
				} else if (typeof canvas === "object") {
					me.canvas = canvas;
				}
				if (typeof image === "string") {
					me.img = new Image();
					me.img.onload = function () {
						ratio = me.img.width / me.img.height;

						if (me.img.width > 800) {
							if (ratio > 1) {
								me.canvas.width = 800;
								me.canvas.height = 600;
							} else {
								me.canvas.width = 600;
								me.canvas.height = 800;
							}
						} else {
							me.canvas.width = me.img.width;
							me.canvas.height = me.img.height;
						}
						me.ctx = me.canvas.getContext('2d');
						me.ctx.drawImage(me.img, 0, 0, me.canvas.width, me.canvas.height); // 800  , 600);
					}
					me.img.src = image; // + '?rand=' + Math.random(); // avoid caching of the image
					me.img.style = "border: 1px black solid;"
				}

				if (typeof canvas === "object") {
					me.img = image;
					me.canvas.width += 0;
					me.ctx = me.canvas.getContext('2d');
					me.ctx.drawImage(me.img, 0, 0);
				}

				if ('ontouchstart' in document) {
					//me.canvas.addEventListener('touchstart', me.draw, false);
					//me.canvas.addEventListener('touchmove', me.draw, false);
					//me.canvas.addEventListener('touchend', me.draw, false);
				} else {
					//me.canvas.addEventListener('mousedown', function (event) {
					//	me.draw(event);
					//	event.preventDefault();
					//}, false);
					//me.canvas.addEventListener('mousemove', me.draw, false);
					//me.canvas.addEventListener('mouseup', me.draw, false);
					//me.canvas.addEventListener('mouseout', me.draw, false);
				}

				me.canvas.addEventListener('touchstart', me.draw, false);
				me.canvas.addEventListener('touchmove', me.draw, false);
				me.canvas.addEventListener('touchend', me.draw, false);

				me.canvas.addEventListener('mousedown', function (event) {
					me.draw(event);
					event.preventDefault();
				}, false);
				me.canvas.addEventListener('mousemove', me.draw, false);
				me.canvas.addEventListener('mouseup', me.draw, false);
				me.canvas.addEventListener('mouseout', me.draw, false);

			},

			// create a function to pass touch events and coordinates to drawer
			draw: function (event) {

				// get the touch coordinates
				var coors = {};
				x = me.findPos(me.canvas).x;
				y = me.findPos(me.canvas).y;
				try {
					if ('ontouchstart' in document) {
						coors = {

							x: event.targetTouches[0].pageX - x, //(event.targetTouches[0].pageX - ToolData.getScrollOffsets().x),  //targetTouches[0].pageX - ToolData.canvas.offsetWidth, //rect.top - root.scrollTop, //- ToolData.canvas.  //offsetLeft ,
							y: event.targetTouches[0].pageY - y //(event.targetTouches[0].pageY - ToolData.getScrollOffsets().y) //targetTouches[0].pageY - ToolData.canvas.offsetHeight //rect.left - root.scrollLeft //- ToolData.canvas.offsetTop

						};
					} else {
						coors = {
							x: event.pageX - x,
							y: event.pageY - y
						};
					}
				} catch (e) {
					coors = {
						x: null,
						y: null
					}
				}
				// pass the coordinates to the appropriate handler
				me[event.type](coors);
			},
			touchstart: function (coors) {
				me.ctx.lineWidth = me.lineWidth;
				me.ctx.strokeStyle = me.color;
				me.ctx.beginPath();
				me.ctx.moveTo(coors.x, coors.y);
				me.isDrawing = true;
			},
			touchmove: function (coors) {

				if (me.isDrawing) {
					me.ctx.lineTo(coors.x, coors.y);
					me.ctx.moveTo(coors.x, coors.y);
					me.ctx.stroke();

					try {
						event.preventDefault();
					} catch (e) {
						return false;
					}
				}
			},
			touchend: function (coors) {
				//console.log('touchend isDrawing : '+ this.isDrawing);
				//            Dom.get('front_of_house').value = this.canvas.toDataURL() ;
				if (coors.x == null && coors.y == null) {
					me.isDrawing = false;
					return;
				}
				if (me.isDrawing) {
					me.touchmove(coors);
					me.isDrawing = false;
				}
			},
			mousedown: function (coors) {
				this.touchstart(coors);
			},
			mousemove: function (coors) {
				this.touchmove(coors);
			},
			mouseup: function (coors) {
				this.touchend(coors);
			},
			mouseout: function (coors) {
				this.touchend(coors);
			},
			findPos: function (obj) {
				var curleft = 0, curtop = 0;
				if (obj.offsetParent) {
					do {
						curleft += obj.offsetLeft;
						curtop += obj.offsetTop;
					} while (obj = obj.offsetParent);
					return {
						x: curleft,
						y: curtop
					};
				}
				return undefined;
			}
		}

	}
	editCanvas.drawer.init(can, img);
	return editCanvas;

}
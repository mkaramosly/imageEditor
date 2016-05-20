var initializeCameraFeed = function () {
    cameraWidth = 400;
    cameraHeight = 300;
    canvasWidth = 1200;
    canvasHeight = 800;

    var video = document.getElementById('cameraFeed');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');

    var drawSegments = [[]];
    var segment = 0;

    var colors = new tracking.ColorTracker(['magenta', 'cyan']);

    colors.on('track', function (event) {
        if (event.data.length === 0) {
            // No colors were detected in this frame.
        } else {
            event.data.forEach(function (rect) {
                console.log(rect.x, rect.y, rect.height, rect.width, rect.color);
            });
        }
    });

    tracking.track('#cameraFeed', colors, {camera: true});

    colors.on('track', function (event) {
        if (event.data.length === 0 && drawSegments[segment].length > 0) {
            segment++;

            if (!drawSegments[segment]) {
                drawSegments[segment] = [];
            }
        }

        event.data.forEach(function (rect) {
            if (rect.color === 'magenta') {
                draw(rect);
            }
            else if (rect.color === 'cyan') {
                erase(rect);
            }
        });
    });

    function draw(rect) {
        //drawSegments[segment].push(rect.x + rect.width / 2, rect.y + rect.height / 2);
        drawSegments[segment].push(
            flip(normalize(canvasWidth,  cameraWidth,  rect.x + rect.width / 2), canvasWidth),
            normalize(canvasHeight, cameraHeight, rect.y + rect.height / 2)
        );
    }

    function erase(rect) {
        context.clearRect(
            flip(normalize(canvasWidth,  cameraWidth,  rect.x), canvasWidth),
            normalize(canvasHeight, cameraHeight, rect.y),
            rect.width,
            rect.height
        );
    }

    (function loop() {
        for (var i = 0, len = drawSegments.length; i < len; i++) {
            drawSpline(context, drawSegments[i], 0.5, false);
        }

        drawSegments = [drawSegments[drawSegments.length - 1]];
        segment = 0;

        requestAnimationFrame(loop);
    }());

    return colors;
}

var destroyCameraFeed = function(cameraFeed) {
};

function normalize(source, target, val)
{
    return val * source / target;
}

function flip(val, range) {
    return range - (val % range);
}
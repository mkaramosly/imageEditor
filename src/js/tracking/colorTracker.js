var initializeCameraFeed = function () {
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
            normalize(0, 1200, 0, 400, rect.x + rect.width / 2),
            normalize(0, 800, 0, 300,  rect.y + rect.height / 2)
        );
    }

    function erase(rect) {
        context.clearRect(
            normalize(0, 1200, 0, 400, rect.x),
            normalize(0, 1200, 0, 400, rect.y),
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

// from: source min value
// to: source max value
// min: target min value
// max: target max value
// toNormalize: value to normalize
function normalize(from, to, min, max, toNormalize)
{
    var value = (toNormalize - min) * (to - from) / (max - min);
    return value;
}
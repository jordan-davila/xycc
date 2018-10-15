/**
 * @file This is my cool script.
 * @copyright Jordan Davila 2018
 */

/**
 * Removes a class with a delay.
 * @param  {string} elementVar [description]
 * @param  {string} className  [description]
 * @param  {int} delay      [description]
 */
function removeClassDelay(elementVar, className, delay) {
     $(elementVar).delay(delay).queue(function(next) {
          $(this).removeClass(className);
     });
}

function removeClassDelayObj(obj, className, delay) {
     obj.delay(delay).queue(function(next) {
          $(this).removeClass(className);
     });
}

// Check Document ready before proceding

$(document).ready(function() {

     if($('#editor')[0]){
          Simditor.locale = 'en-US';
          var editor = new Simditor({
                 textarea: $('#editor'),
                  toolbar: [
                      'title',
                      'bold',
                      'italic',
                      'underline',
                      'strikethrough',
                      'fontScale',
                      'color',
                      'ol',
                      'ul',
                      'blockquote',
                      'code',
                      'indent',
                      'outdent',
                      'alignment',
                      'fullscreen'
                ]
          });

     } else if ($('#no_editor')[0]){
          var editor = new Simditor({
                 textarea: $('#no_editor'),
                  toolbar: false
          });
     }


     // Load Background particles
     /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
     particlesJS('particles',

       {
         "particles": {
           "number": {
             "value": 80,
             "density": {
               "enable": true,
               "value_area": 800
             }
           },
           "color": {
             "value": "#e43f48"
           },
           "shape": {
             "type": "circle",
             "stroke": {
               "width": 0,
               "color": "#000000"
             },
             "polygon": {
               "nb_sides": 5
             },
             "image": {
               "src": "img/github.svg",
               "width": 100,
               "height": 100
             }
           },
           "opacity": {
             "value": 0.5,
             "random": false,
             "anim": {
               "enable": false,
               "speed": 1,
               "opacity_min": 0.1,
               "sync": false
             }
           },
           "size": {
             "value": 5,
             "random": true,
             "anim": {
               "enable": false,
               "speed": 40,
               "size_min": 0.1,
               "sync": false
             }
           },
           "line_linked": {
             "enable": true,
             "distance": 150,
             "color": "#e43f48",
             "opacity": 0.4,
             "width": 1
           },
           "move": {
             "enable": true,
             "speed": 6,
             "direction": "none",
             "random": false,
             "straight": false,
             "out_mode": "out",
             "attract": {
               "enable": false,
               "rotateX": 600,
               "rotateY": 1200
             }
           }
         },
         "interactivity": {
           "detect_on": "canvas",
           "events": {
             "onhover": {
               "enable": false,
               "mode": "repulse"
             },
             "onclick": {
               "enable": true,
               "mode": "push"
             },
             "resize": true
           },
           "modes": {
             "grab": {
               "distance": 400,
               "line_linked": {
                 "opacity": 1
               }
             },
             "bubble": {
               "distance": 400,
               "size": 40,
               "duration": 2,
               "opacity": 8,
               "speed": 3
             },
             "repulse": {
               "distance": 200
             },
             "push": {
               "particles_nb": 4
             },
             "remove": {
               "particles_nb": 2
             }
           }
         },
         "retina_detect": true,
         "config_demo": {
           "hide_card": false,
           "background_color": "#b61924",
           "background_image": "",
           "background_position": "50% 50%",
           "background_repeat": "no-repeat",
           "background_size": "cover"
         }
       }

     );

     $('#menu_btn').click(function() {
          $('#main_nav').toggleClass('slide_nav_right');
     });

     /**
      * /courses/edit -> classes
      * On change select, redirect to desire class semester
      */

     if($('.semester_selector')[0]){
          $('.semester_selector').change(function(){
               window.location.replace($(this).val());
          });
     }

     /**
      * Smooth Scroll Effect: Add a smooth scroll effect with hash (#)
      * links. Use html class 'scrollable' to any scrollable elementßß
      */

     $('.scrollable').on('click', 'a[href^="#"]', function(e) {
          e.preventDefault();
          $('.scrollable').animate({
               scrollTop: $($.attr(this, 'href')).offset().top
          }, 1000);
     });

     // progressbar.js@1.0.0 version is used
     // Docs: http://progressbarjs.readthedocs.org/en/1.0.0/

     if($('#progress_circle')[0]){
          var bar = new ProgressBar.Circle(progress_circle, {
               strokeWidth: 6,
               easing: 'easeInOut',
               duration: 1400,
               color: '#e43f48',
               trailColor: '#eee',
               trailWidth: 1,
               svgStyle: null,
               step: function(state, circle) {
                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                         circle.setText('');
                    } else {
                         circle.setText(value + '%');
                    }
               }
          });

          bar.animate(0.73); // Number from 0.0 to 1.0
     }

     if($('#total_credits')[0]){
          var total_credits_bar = new ProgressBar.Line(total_credits, {
               strokeWidth: 4,
               easing: 'easeInOut',
               duration: 1400,
               color: '#ff9547',
               trailColor: '#eee',
               trailWidth: 1,
               svgStyle: {
                    width: '100%',
                    height: '100%'
               },
               text: {
                    style: {
                         // Text color.
                         // Default: same as stroke color (options.color)
                         color: '#999',
                         position: 'absolute',
                         left: '0',
                         top: '30px',
                         padding: 0,
                         margin: 0,
                         transform: null
                    },
                    autoStyleContainer: false
               },
               from: {
                    color: '#FFEA82'
               },
               to: {
                    color: '#ED6A5A'
               },
               step: (state, total_credits_bar) => {
                    total_credits_bar.setText('Total Credits: ' + Math.round(total_credits_bar.value() * 100) + ' %');
               }
          });

          total_credits_bar.animate(0.65);
     }

     if($('#total_credits_school')[0]){
          var total_credits_school_bar = new ProgressBar.Line(total_credits_school, {
               strokeWidth: 4,
               easing: 'easeInOut',
               duration: 1400,
               color: '#ff9547',
               trailColor: '#eee',
               trailWidth: 1,
               svgStyle: {
                    width: '100%',
                    height: '100%'
               },
               text: {
                    style: {
                         // Text color.
                         // Default: same as stroke color (options.color)
                         color: '#999',
                         position: 'absolute',
                         left: '0',
                         top: '30px',
                         padding: 0,
                         margin: 0,
                         transform: null
                    },
                    autoStyleContainer: false
               },
               from: {
                    color: '#FFEA82'
               },
               to: {
                    color: '#ED6A5A'
               },
               step: (state, total_credits_school_bar) => {
                    total_credits_school_bar.setText('Semester Progress: ' + Math.round(total_credits_school_bar.value() * 100) + ' %');
               }
          });

          total_credits_school_bar.animate(0.68);
     }

     if($('#semester_progress')[0]){
          var semester_progress_bar = new ProgressBar.Line(semester_progress, {
               strokeWidth: 4,
               easing: 'easeInOut',
               duration: 1400,
               color: '#ff9547',
               trailColor: '#eee',
               trailWidth: 1,
               svgStyle: {
                    width: '100%',
                    height: '100%'
               },
               text: {
                    style: {
                         // Text color.
                         // Default: same as stroke color (options.color)
                         color: '#999',
                         position: 'absolute',
                         left: '0',
                         top: '30px',
                         padding: 0,
                         margin: 0,
                         transform: null
                    },
                    autoStyleContainer: false
               },
               from: {
                    color: '#FFEA82'
               },
               to: {
                    color: '#ED6A5A'
               },
               step: (state, semester_progress_bar) => {
                    semester_progress_bar.setText('School Credits: ' + Math.round(semester_progress_bar.value() * 100) + ' %');
               }
          });

          semester_progress_bar.animate(0.68);
     }

     if ($('#line_chart')[0]) {

          var ctx = document.getElementById("line_chart").getContext('2d');
          var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
          gradientStroke.addColorStop(0, "#A747B4");
          gradientStroke.addColorStop(1, "#E43F48");

		var config = {
			type: 'line',
			data: {
				labels: ['APR 18', 'APR 19', 'APR 20', 'APR 21', 'APR 22'],
				datasets: [{
					borderColor: gradientStroke,
                         borderWidth: 5,
					backgroundColor: '#fbfbfb33',
					data: [2320,1324,2705,1103,2313]
				}]
			},
			options: {
				responsive: true,
				title: {
					display: false,
					text: 'Chart.js Line Chart - Stacked Area'
				},
                    legend: {
                       display: false
                    },
				hover: {
					mode: 'index'
				},
				scales: {
					xAxes: [{
                              ticks: {
                                   display: false,
                                   beginAtZero: true
                              },
						scaleLabel: {
							display: false,
							labelString: 'Month'
						},
                              gridLines: {
                                   color: "#eee",
                              }
					}],
					yAxes: [{
                              ticks: {
                                   display: false,
                                   beginAtZero: true
                              },
						scaleLabel: {
							display: false,
							labelString: 'Value'
						},
                              gridLines: {
                                   color: "#eee",
                              }
					}]
				}
			}
		};
          var myChart = new Chart(ctx, config);
     }

})

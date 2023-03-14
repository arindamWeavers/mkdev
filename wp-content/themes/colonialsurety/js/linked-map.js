(function ($) {
    var is_touch = 'ontouchstart' in window || navigator.maxTouchPoints;

    function map() {
        var $map_wr     = $('.js-linked-map');

        if (!$map_wr.length) {
            return;
        }

        var map_text_opt = {
            'WA': {
                x: -12,
                y: -7
            },
            'MT': {
                x: -9,
                y: -12
            },
            'ND': {
                x: -13,
                y: -9
            },
            'MN': {
                x: -29,
                y: 2
            },
            'WI': {
                x: -12,
                y: -12
            },
            'MI': {
                x: 20,
                y: 25
            },
            'NY': {
                x: -5,
                y: -11
            },
            'OR': {
                x: -17,
                y: -6
            },
            'ID': {
                x: -12,
                y: 29
            },
            'WY': {
                x: -11,
                y: -10
            },
            'SD': {
                x: -11,
                y: -14
            },
            'AI': {
                x: -12,
                y: -13
            },
            'IL': {
                x: -4,
                y: -20
            },
            'IN': {
                x: -8,
                y: -12
            },
            'OH': {
                x: -8,
                y: -6
            },
            'PA': {
                x: -14,
                y: -10
            },
            'NE': {
                x: -12,
                y: -10
            },
            'NV': {
                x: -13,
                y: -31
            },
            'CA': {
                x: -32,
                y: -4
            },
            'UT': {
                x: -13,
                y: -3
            },
            'CO': {
                x: -15,
                y: -10
            },
            'KS': {
                x: -12,
                y: -10
            },
            'OK': {
                x: 13,
                y: -12
            },
            'TX': {
                x: 4,
                y: -10
            },
            'LA': {
                x: -31,
                y: -13
            },
            'NM': {
                x: -11,
                y: -11
            },
            'AZ': {
                x: -9,
                y: -14
            },
            'AK': {
                x: -4,
                y: -28
            },
            'IA': {
                x: -12,
                y: -13
            },
            'AR': {
                x: -12,
                y: -15
            },
            'TN': {
                x: -16,
                y: -8
            },
            'MS': {
                x: -7,
                y: -14
            },
            'AL': {
                x: -12,
                y: -11
            },
            'GA': {
                x: -11,
                y: -1
            },
            'SC': {
                x: -4,
                y: -14
            },
            'KY': {
                x: 6,
                y: -7
            },
            'WV': {
                x: -26,
                y: 4
            },
            'VA': {
                x: 7,
                y: -5
            },
            'MO': {
                x: -18,
                y: -10
            },
            'NC': {
                x: 7,
                y: -12
            },
            'VT': {
                x: -21,
                y: -51,
                color: '#093953',
                line: {
                    x: 839,
                    y: 107,
                    x2: 830,
                    y2: 84
                }
            },
            'ME': {
                x: -15,
                y: -13
            },
            'NH': {
                x: 35,
                y: -6,
                color: '#093953',
                line: {
                    x: 862,
                    y: 128,
                    x2: 898,
                    y2: 119
                }
            },
            'MA': {
                x: 25,
                y: -26,
                color: '#093953',
                line: {
                    x: 866,
                    y: 147,
                    x2: 892,
                    y2: 138
                }
            },
            'RI': {
                x: 32,
                y: -21,
                color: '#093953',
                line: {
                    x: 872,
                    y: 161,
                    x2: 903,
                    y2: 151
                }
            },
            'CT': {
                x: 45,
                y: -5,
                color: '#093953',
                line: {
                    x: 855,
                    y: 168,
                    x2: 895,
                    y2: 174
                }
            },
            'NJ': {
                x: 38,
                y: -8,
                color: '#093953',
                line: {
                    x: 835,
                    y: 206,
                    x2: 866,
                    y2: 210
                }
            },
            'DE': {
                x: 44,
                y: -8,
                color: '#093953',
                line: {
                    x: 826,
                    y: 235,
                    x2: 866,
                    y2: 232
                }
            },
            'MD': {
                x: 74,
                y: -1,
                color: '#093953',
                line: {
                    x: 808,
                    y: 238,
                    x2: 866,
                    y2: 245
                }
            },
            'HI': {
                x: -6,
                y: 0,
                color: '#093953'
            },
            'FL': {
                x: 29,
                y: -25
            },
            'D.C.': {
                // x: 870,
                // y: 270,
                x: 70,
                y: 28,
                color: '#093953',
                line: {
                    x: 801,
                    y: 240,
                    x2: 866,
                    y2: 279
                }
            }
        };
        var data        = MAP_DATA;
        var locations   = data.locations;
        var link_text   = data.link_text;
        var map_view_id = 'linked-map';
        var map_view    = false;
        var c_default   = '#093954';
        var c_active    = '#CE1C10';
        var c_disable   = '#555555';

        var $map_view   = $map_wr.find('.js-linked-map__view');
        var $link_other = $map_wr.find('.js-linked-map__other');
        var $tooltip    = $map_wr.find('.js-linked-map__tooltip');
        var $map_popup  = $map_wr.find('.js-linked-map__popup');
        var $map_popup_cont = $map_popup.find('.js-linked-map__popup-content');

        /**
         * Get SVG-map
         */
        $.ajax({
            url: '/wp-content/themes/colonialsurety/images/vector/map.svg',
            dataType: 'html',
            success: function (svg_template) {
                $map_view.html(svg_template);
                map_view = SVG(map_view_id);
                markDisabled();
                bindEvents();
                updateOtherLink();
            },
            error: function (xhr, status) {
                console.log('Error:', status);
            }
        });

        /**
         * Mark regions that should be disabled
         * (absent in the locations list or don't include any link)
         */
        function markDisabled() {
            map_view.select('path[data-id], polygon[data-id]')
                .each(function () {
                    var loc_id = this.data('id').split('--')[0],
                        array_i;
                    if (
                        locations.some(function (loc_data, i) {
                            array_i = i;
                            return loc_id.split('--')[0].toLowerCase() === loc_data.region.toLowerCase()
                                && loc_data.url_link;
                        })
                    ) {
                        this.data('array_i', array_i);
                    } else {
                        this.addClass('disabled');
                        this.style({ fill: c_disable });
                    }
                });
        }

        /**
         * Bind all needed events
         */
        function bindEvents() {
            $(document).on('click', function (e) {
                /*var $target = $(e.target);
                if (
                    !$target.closest('path[data-id]:not(.disabled), polygon[data-id]:not(.disabled)').length
                    && !$target.closest('.js-linked-map__popup').length
                ) {
                }*/
                popupHide();
            });

            $map_popup
                .on('click', function (e) {
                    e.stopPropagation();
                })
                .on('click', '.js-linked-map__popup-close', function (e) {
                    e.preventDefault();
                    popupHide();
                });

            var regions = map_view.select('path[data-id], polygon[data-id]');
            regions.each(function () {
                var region_id = this.attr('data-id');
                if (region_id.split('--').length > 1) {
                    return;
                }
                addText(region_id, this);
            });

            var active_regions = map_view.select('path[data-id]:not(.disabled), polygon[data-id]:not(.disabled)');
            active_regions
                .on('click', function (e) {
                    e.stopPropagation();
                    popupHide();
                    popupOpen(this);
                    placePopup(this.cx(), this.cy());
                })
                .on('mouseenter', function () {
                    highlightReguin(this);
                })
                .on('mouseleave', function () {
                    if (!is_touch) {
                        $tooltip.removeClass('active');
                    }
                    if ($map_popup.data('current') !== this.data('id')) {
                        unHighlightReguin(this);
                    }
                });

            var regions_text = map_view.select('.region-text:not(.disabled)');
            regions_text
                .on('click', function (e) {
                    var region = map_text_opt[this.attr('data-region')].region;
                    e.stopPropagation();
                    popupHide();
                    popupOpen(region);
                    placePopup(region.cx(), region.cy());
                })
                .on('mouseenter', function () {
                    var region = map_text_opt[this.attr('data-region')].region;
                    if (region) {
                        highlightReguin(region);
                    }
                })
                .on('mouseleave', function () {
                    var id = this.attr('data-region');
                    var region = map_text_opt[this.attr('data-region')].region;
                    if (!is_touch) {
                        $tooltip.removeClass('active');
                    }
                    if (region && $map_popup.data('current') !== id) {
                        unHighlightReguin(region);
                    }
                });

            if (is_touch) {
                return;
            }
            function moveTooltip(e) {
                var x = (e.pageX - $map_view.offset().left) + 10;
                var y = (e.pageY - $map_view.offset().top) + 10;

                if (x + $tooltip.width() > $map_view.width()) {
                    x = $map_view.width() - $tooltip.width();
                }
                if (y + $tooltip.height() > $map_view.height()) {
                    y = $map_view.height() - $tooltip.height();
                }

                $tooltip.css({
                    top : y,
                    left: x
                });
            }
            active_regions.on('mousemove', moveTooltip);
            regions_text.on('mousemove', moveTooltip);
        }

        /**
         * Update Other link parameters
         */
        function updateOtherLink() {
            var link = '';
            if (
                locations.filter(function (loc) {
                    if (loc.region.toLowerCase() === 'all' && loc.url_link) {
                        link = loc.url_link;
                        return true;
                    } else {
                        return false;
                    }
                }).length
            ) {
                $link_other
                    .attr('href', link)
                    .addClass('activated');
            }
        }

        /**
         * Render html in the popup
         * @param {string} id
         */
        function popupRender(id) {
            var location_f = locations.filter(function (loc) {
                return loc.region.toLowerCase() === id.toLowerCase();
            });
            var location = location_f.length ? location_f[0] : false;
            var title = (location && location.title) ? location.title : 'Title';
            var url   = (location && location.url_link) ? location.url_link : '#link';

            $map_popup_cont.html(
                tmpl('tmpl-map-popup', {
                    url: url,
                    title: title,
                    btn_text: link_text
                })
            );
        }

        /**
         * Place popup
         * @param {number|string} orig_x
         * @param {number|string} orig_y
         */
        function placePopup(orig_x, orig_y) {
            var x = orig_x;
            var y = orig_y + 10;
            var map_view_w = $map_view.width();
            var map_popup_cont_w = $map_popup_cont.outerWidth();
            var map_popup_cont_h = $map_popup_cont.outerHeight();

            if (x - map_popup_cont_w/2 < 0) {
                x = map_popup_cont_w/2;
            }
            if (x + map_popup_cont_w/2 > map_view_w) {
                x = map_view_w - map_popup_cont_w/2;
            }
            if (y - map_popup_cont_h < 0) {
                y = map_popup_cont_h;
            }
            $map_popup.css({
                top: y,
                left: x
            });
        }

        /**
         * show popup
         * @param {HTMLElement} el
         */
        function popupOpen(el) {
            var id = el.data('id');
            if (id) {
                popupRender(id);
            }
            highlightReguin(el);
            $map_popup.data('current', id);
            $map_popup.addClass('open');
        }

        /**
         * Hide popup
         */
        function popupHide() {
            if ($map_popup.data('current')) {
                unHighlightReguin(map_view.select('[data-id="' + $map_popup.data('current') + '"]'));
            }
            $map_popup.data('current', false);
            $map_popup.removeClass('open');
        }
        function addLine(line_options) {
            map_view.line(line_options.x, line_options.y, line_options.x2, line_options.y2)
                .style({
                    'pointer-events': 'none'
                })
                .attr({
                    stroke: '#C81B13'
                });
        }
        function addText(region_id, region) {
            console.log(region_id);
            var svg_text = map_view.text(region_id);
            var cx = region ? region.cx() : 0;
            var cy = region ? region.cy() : 0;
            var color = '#fff';
            var txt_options = map_text_opt[region_id];
            if (txt_options) {
                if (txt_options.x) {
                    cx += txt_options.x;
                }
                if (txt_options.y) {
                    cy += txt_options.y;
                }
                if (txt_options.color) {
                    color += txt_options.color;
                }
            }
            svg_text
                .style({
                    // 'pointer-events': 'none',
                    'cursor': ((!region || region.hasClass('disabled')) ? 'default' : 'pointer')
                })
                .font({
                    fill: color,
                    'font-family': 'Raleway, sans-serif',
                    'font-weight': '500'
                })
                .move(cx, cy)
                .addClass('region-text' + ((!region || region.hasClass('disabled')) ? 'disabled' : ''))
                .data('region', region_id);

            if (region) {
                txt_options.region = region;
            }

            if (txt_options.line) {
                addLine(txt_options.line);
            }
        }

        function highlightReguin(region) {
            if (!is_touch) {
                $tooltip
                    .text(locations[region.data('array_i')].title)
                    .addClass('active');
            }
            region.style({ fill: c_active });
        }
        function unHighlightReguin(region) {
            region.style({ fill: c_default });
        }
    }

    $(function () {
        map();
    })
})(jQuery);
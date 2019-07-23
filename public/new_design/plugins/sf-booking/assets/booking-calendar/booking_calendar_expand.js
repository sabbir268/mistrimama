if (typeof jQuery == "undefined") {
    throw new Error("jQuery is not loaded")
}

datearr = [];
bookedarr = [];
allocatedarr = [];
selecteddatesarr = [];
disabledates = [];
	

jQuery.fn.zabuto_calendar = function(b) {
   
	var c = jQuery.extend({}, jQuery.fn.zabuto_calendar_defaults(), b);
    var a = jQuery.fn.zabuto_calendar_language(c.language);
	
	
	
    c = jQuery.extend({}, c, a);
    this.each(function() {
        var j = jQuery(this);
        j.attr("id", "zabuto_calendar_" + Math.floor(Math.random() * 99999).toString(36));
        j.data("initYear", c.year);
        j.data("initMonth", c.month);
        j.data("monthLabels", c.month_labels);
        j.data("weekStartsOn", c.weekstartson);
        j.data("navIcons", c.nav_icon);
        j.data("dowLabels", c.dow_labels);
        j.data("showToday", c.today);
		j.data('selecteddate', c.date);
		j.data('selectedday', c.selectedday);
		j.data('mode', c.mode);
		j.data('daynum', c.daynum);
        j.data("showDays", c.show_days);
        j.data("showPrevious", c.show_previous);
        j.data("showNext", c.show_next);
        j.data("cellBorder", c.cell_border);
        j.data("jsonData", c.data);
        j.data("ajaxSettings", c.ajax);
        j.data("legendList", c.legend);
        j.data("actionFunction", c.action);
        j.data("actionNavFunction", c.action_nav);
		j.data('datearr', c.datearr);
		j.data('bookedarr', c.bookedarr);
		j.data('allocatedarr', c.allocatedarr);
		j.data('selecteddatesarr', c.selecteddatesarr);
		j.data('disabledates', c.disabledates);
        l();

		function l() {
           
		   var y = parseInt(j.data("initYear"));
            var B = parseInt(j.data("initMonth")) - 1;
            var C = new Date(y, B, 1, 0, 0, 0, 0);
            j.data("initDate", C);
            var D = (j.data("cellBorder") === true) ? " table-bordered" : "";
            $tableObj = jQuery('<table class="table' + D + ' table-bordered"></table>');
            $tableObj = w(j, $tableObj, C.getFullYear(), C.getMonth());
            $legendObj = g(j);
            var z = jQuery('<div class="zabuto_calendar" id="' + j.attr("id") + '"></div>');
            z.append($tableObj);
            z.append($legendObj);
            j.append(z);
            var A = j.data("jsonData");
            if (false !== A) {
                r(j, C.getFullYear(), C.getMonth())
            }
        }

        function w(A, C, z, B) {
			var y = new Date(z, B, 1, 0, 0, 0, 0);
            A.data("currDate", y);
            C.empty();
            C = s(A, C, z, B);
            C = e(A, C);
            C = q(A, C, z, B);
            r(A, z, B);
            return C
        }

        function g(A) {
            var y = jQuery('<div class="legend" id="' + A.attr("id") + '_legend"></div>');
            var z = A.data("legendList");
            if (typeof(z) == "object" && z.length > 0) {
                jQuery(z).each(function(E, G) {
                    if (typeof(G) == "object") {
                        if ("type" in G) {
                            var F = "";
                            if ("label" in G) {
                                F = G.label
                            }
                            switch (G.type) {
                                case "text":
                                    if (F !== "") {
                                        var D = "";
                                        if ("badge" in G) {
                                            if (typeof(G.classname) === "undefined") {
                                                var H = "badge-event"
                                            } else {
                                                var H = G.classname
                                            }
                                            D = '<span class="badge ' + H + '">' + G.badge + "</span> "
                                        }
                                        y.append('<span class="legend-' + G.type + '">' + D + F + "</span>")
                                    }
                                    break;
                                case "block":
                                    if (F !== "") {
                                        F = "<span>" + F + "</span>"
                                    }
                                    if (typeof(G.classname) === "undefined") {
                                        var C = "event"
                                    } else {
                                        var C = "event-styled " + G.classname
                                    }
                                    y.append('<span class="legend-' + G.type + '"><ul class="legend"><li class="' + C + '"></li></u>' + F + "</span>");
                                    break;
                                case "list":
                                    if ("list" in G && typeof(G.list) == "object" && G.list.length > 0) {
                                        var B = jQuery('<ul class="legend"></u>');
                                        jQuery(G.list).each(function(J, I) {
                                            B.append('<li class="' + I + '"></li>')
                                        });
                                        y.append(B)
                                    }
                                    break;
                                case "spacer":
                                    y.append('<span class="legend-' + G.type + '"> </span>');
                                    break
                            }
                        }
                    }
                })
            }
            return y
        }

        function s(N, B, K, I) {
            var J = N.data("navIcons");
            var G = jQuery('<span><span class="glyphicon glyphicon-chevron-left"></span></span>');
            var H = jQuery('<span><span class="glyphicon glyphicon-chevron-right"></span></span>');
            if (typeof(J) === "object") {
                if ("prev" in J) {
                    G.html(J.prev)
                }
                if ("next" in J) {
                    H.html(J.next)
                }
            }
            var M = N.data("showPrevious");
            if (typeof(M) === "number" || M === false) {
                M = p(N.data("showPrevious"), true)
            }
            var L = jQuery('<div class="calendar-month-navigation"></div>');
            L.attr("id", N.attr("id") + "_nav-prev");
            L.data("navigation", "prev");
            if (M !== false) {
                prevMonth = (I - 1);
                prevYear = K;
                if (prevMonth == -1) {
                    prevYear = (prevYear - 1);
                    prevMonth = 11
                }
                L.data("to", {
                    year: prevYear,
                    month: (prevMonth + 1)
                });
                L.append(G);
                if (typeof(N.data("actionNavFunction")) === "function") {
                    L.click(N.data("actionNavFunction"))
                }
                L.click(function(P) {
                    w(N, B, prevYear, prevMonth)
                })
            }
            var F = N.data("showNext");
            if (typeof(F) === "number" || F === false) {
                F = p(N.data("showNext"), false)
            }
            var D = jQuery('<div class="calendar-month-navigation"></div>');
            D.attr("id", N.attr("id") + "_nav-next");
            D.data("navigation", "next");
            if (F !== false) {
                nextMonth = (I + 1);
                nextYear = K;
                if (nextMonth == 12) {
                    nextYear = (nextYear + 1);
                    nextMonth = 0
                }
                D.data("to", {
                    year: nextYear,
                    month: (nextMonth + 1)
                });
                D.append(H);
                if (typeof(N.data("actionNavFunction")) === "function") {
                    D.click(N.data("actionNavFunction"))
                }
                D.click(function(P) {
                    w(N, B, nextYear, nextMonth)
                })
            }
            var O = N.data("monthLabels");
            var E = jQuery("<th></th>").append(L);
            var y = jQuery("<th></th>").append(D);
            var C = jQuery("<span>" + O[I] + " " + K + "</span>");
            C.dblclick(function() {
                var P = N.data("initDate");
                w(N, B, P.getFullYear(), P.getMonth())
            });
            var z = jQuery('<th colspan="5"></th>');
            z.append(C);
            var A = jQuery('<tr class="calendar-month-header"></tr>');
            A.append(E, z, y);
            B.append(A);
            return B
        }

        function e(B, D) {
            if (B.data("showDays") === true) {
                var y = B.data("weekStartsOn");
                var z = B.data("dowLabels");
                if (y === 0) {
                    var C = jQuery.extend([], z);
                    var E = new Array(C.pop());
                    z = E.concat(C)
                }
                var A = jQuery('<tr class="calendar-dow-header"></tr>');
                jQuery(z).each(function(F, G) {
                    A.append("<th>" + G + "</th>")
                });
                D.append(A)
            }
            return D
        }
		
		function q(G, F, I, N) {
			ZZ = G.data('datearr');
			DD = G.data('bookedarr');
			LL = G.data('allocatedarr');
			QQ = G.data('selecteddatesarr');
			WW = G.data('disabledates');
			var E = G.data("ajaxSettings");
            var H = t(I, N);
            var y = o(I, N);
            var D = i(I, N, 1);
            var P = i(I, N, y);
            var C = 1;
			var datearr = [];
			var chk = [];
			
			var bookedarr = [];
			var bookedchk = [];
			var allocatedchk = [];
			var aselectedchk = [];
			var disabledateschk = [];
			
			var mysetdate = [];
			
			var sadate = [];
			
			
            var B = G.data("weekStartsOn");
            if (B === 0) {
                if (P == 6) {
                    H++
                }
                if (D == 6 && (P == 0 || P == 1 || P == 5)) {
                    H--
                }
                D++;
                if (D == 7) {
                    D = 0
                }
            }
			
			if(ZZ != "" && ZZ != null){
			for (ii = 0; ii < ZZ.length; ii++) {
				var addate = ZZ[ii];
				
				var datestr = addate.split("-"); 
			
				var aa = parseInt(datestr[0]);
				var bb = parseInt(datestr[1])-1;
				var cc = parseInt(datestr[2]);
				if(Date.parse(k(aa, bb, cc)) > 0){
				chk.push(Date.parse(k(aa, bb, cc)));
				}
			}
			}
			
			if(DD != "" && DD != null){
			for (kk = 0; kk < DD.length; kk++) {
				var bookedaddate = DD[kk];
				var bookeddatestr = bookedaddate.split("-"); 
			
				var aaa = parseInt(bookeddatestr[0]);
				var bbb = parseInt(bookeddatestr[1])-1;
				var ccc = parseInt(bookeddatestr[2]);
				if(Date.parse(k(aaa, bbb, ccc)) > 0){
				bookedchk.push(Date.parse(k(aaa, bbb, ccc)));
				}
			}
			}
			
			if(LL != "" && LL != null){
			for (jj = 0; jj < LL.length; jj++) {
				var allocateddate = LL[jj];
				var allocateddatestr = allocateddate.split("-"); 
			
				var aaaa = parseInt(allocateddatestr[0]);
				var bbbb = parseInt(allocateddatestr[1])-1;
				var cccc = parseInt(allocateddatestr[2]);
				if(Date.parse(k(aaaa, bbbb, cccc)) > 0){
				allocatedchk.push(Date.parse(k(aaaa, bbbb, cccc)));
				}
			}
			}
			
			if(QQ != "" && QQ != null){
			for (xx = 0; xx < QQ.length; xx++) {
				var aselecteddates = QQ[xx];
				var aselecteddatesstr = aselecteddates.split("-"); 
			
				var aaaaa = parseInt(aselecteddatesstr[0]);
				var bbbbb = parseInt(aselecteddatesstr[1])-1;
				var ccccc = parseInt(aselecteddatesstr[2]);
				if(Date.parse(k(aaaaa, bbbbb, ccccc)) > 0){
				aselectedchk.push(Date.parse(k(aaaaa, bbbbb, ccccc)));
				}
			}
			}
			
			if(WW != "" && WW != null){
			for (tt = 0; tt < WW.length; tt++) {
				var adisabledates = WW[tt];
				var aadisabledatesstr = adisabledates.split("-"); 
			
				var aaaaaa = parseInt(aadisabledatesstr[0]);
				var bbbbbb = parseInt(aadisabledatesstr[1])-1;
				var cccccc = parseInt(aadisabledatesstr[2]);
				if(Date.parse(k(aaaaaa, bbbbbb, cccccc)) > 0){
				disabledateschk.push(Date.parse(k(aaaaaa, bbbbbb, cccccc)));
				}
			}
			}
			
            for (var A = 0; A < H; A++) {
                var z = jQuery('<tr class="calendar-dow"></tr>');
                for (var K = 0; K < 7; K++) {
                    if (K < D || C > y) {
                        z.append("<td></td>")
                    } else {
                        var hh = new Date();
                        var cy = hh.getFullYear();
                        var cm = hh.getMonth();
                        cd = hh.getDate();
						
						
						var seldate = service_finder_getCookie('setselecteddate');
						if(seldate != ""){
						var sdate = seldate.split("-"); 
			
						var ma = parseInt(sdate[0]);
						var mb = parseInt(sdate[1])-1;
						var mc = parseInt(sdate[2]);
						if(Date.parse(k(ma, mb, mc)) > 0){
						sadate.push(Date.parse(k(ma, mb, mc)));
						}
						}
						
						var mydate = G.data('selecteddate');
						if(mydate != "" && mydate != null){
						var mdate = mydate.split("-"); 
			
						var ta = parseInt(mdate[0]);
						var tb = parseInt(mdate[1])-1;
						var tc = parseInt(mdate[2]);
						if(Date.parse(k(ta, tb, tc)) > 0){
						mysetdate.push(Date.parse(k(ta, tb, tc)));
						}
						}
						
						if (x(I, N, C)) {
							var xtoday = 'badge badge-today';
						}else{
							var xtoday = '';
						}
						
						if (Date.parse(k(cy, cm, cd)) > Date.parse(k(I, N, C))) {
                            z.append('<td class="'+xtoday+' dow-clickable"><div class="day">' + C + '</div></td>');
                        } else if (jQuery.inArray(Date.parse(k(I, N, C)), chk) > -1 && (G.data('mode') == 'add' || G.data('mode') == 'edit') && jQuery.inArray(Date.parse(k(I, N, C)), mysetdate) == -1) {
                            z.append('<td class="'+xtoday+' dow-clickable unavailable"><div class="day">' + C + '</div></td>');
						}else if (jQuery.inArray(Date.parse(k(I, N, C)), disabledateschk) > -1 && (G.data('mode') == 'add' || G.data('mode') == 'edit')) {
                            z.append('<td class="'+xtoday+' dow-clickable unavailable"><div class="day">' + C + '</div></td>');
						}else if (jQuery.inArray(Date.parse(k(I, N, C)), aselectedchk) > -1 && (G.data('mode') == 'add' || G.data('mode') == 'edit')) {
                            z.append('<td class="'+xtoday+' dow-clickable selected"><div class="day">' + C + '</div></td>');
                        } else if (jQuery.inArray(Date.parse(k(I, N, C)), bookedchk) > -1 && (G.data('mode') == 'add' || G.data('mode') == 'edit')) {
                            z.append('<td class="'+xtoday+' dow-clickable allbooked"><div class="day">' + C + '</div></td>');
                        } else if (jQuery.inArray(Date.parse(k(I, N, C)), allocatedchk) > -1 && (G.data('mode') == 'add' || G.data('mode') == 'edit') && jQuery.inArray(Date.parse(k(I, N, C)), mysetdate) == -1) {
                            z.append('<td class="'+xtoday+' dow-clickable unavailable"><div class="day">' + C + '</div></td>');
                        } else if (jQuery.inArray(K, G.data('daynum')) == -1 && (G.data('mode') == 'add' || G.data('mode') == 'edit')) {
                            z.append('<td class="'+xtoday+' dow-clickable unavailable"><div class="day">' + C + '</div></td>');
                        } else {
                            var O = G.attr("id") + "_" + k(I, N, C);
                            var M = O + "_day";
                            var L = jQuery('<div id="' + M + '" class="day" >' + C + "</div>");
                            L.data("day", C);

								if (x(I, N, C)) {
									var J = jQuery('<td id="' + O + '" class="badge badge-today"></td>');
                                }else{
									var J = jQuery('<td id="' + O + '"></td>');	
								}
                            
                            J.append(L);
                            J.data("date", k(I, N, C));
                            J.data("hasEvent", false);
                            if (typeof(G.data("actionFunction")) === "function") {
                                J.addClass("dow-clickable");
								
								if (jQuery.inArray(Date.parse(k(I, N, C)), sadate) > -1) {
							
										J.addClass("selected");
								}
								
                                J.click(function() {
                                    G.data("selectedDate", jQuery(this).data("date"))
                                });
                                J.click(G.data("actionFunction"))
                            }
                            z.append(J);
                        }
                        C++
                    }
                    if (K == 6) {
                        D = 0
                    }
                }
                F.append(z)
            }
            return F
        }

        function h(B, H, G, J) {
            var I = jQuery('<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>');
            var A = jQuery('<h4 class="modal-title" id="' + B + '_modal_title">' + H + "</h4>");
            var K = jQuery('<div class="modal-header"></div>');
            K.append(I);
            K.append(A);
            var F = jQuery('<div class="modal-body" id="' + B + '_modal_body">' + G + "</div>");
            var E = jQuery('<div class="modal-footer" id="' + B + '_modal_footer"></div>');
            if (typeof(J) !== "undefined") {
                var z = jQuery("<div>" + J + "</div>");
                E.append(z)
            }
            var C = jQuery('<div class="modal-content"></div>');
            C.append(K);
            C.append(F);
            C.append(E);
            var y = jQuery('<div class="modal-dialog"></div>');
            y.append(C);
            var D = jQuery('<div class="modal fade" id="' + B + '_modal" tabindex="-1" role="dialog" aria-labelledby="' + B + '_modal_title" aria-hidden="true"></div>');
            D.append(y);
            D.data("dateId", B);
            D.attr("dateId", B);
            return D
        }

        function r(A, z, C) {
            var y = A.data("jsonData");
            var B = A.data("ajaxSettings");
            A.data("events", false);
            if (false !== y) {
                return n(A)
            } else {
                if (false !== B) {
                    return u(A, z, C)
                }
            }
            return true
        }

        function n(z) {
            var y = z.data("jsonData");
            z.data("events", y);
            f(z, "json");
            return true
        }

        function u(z, y, C) {
            var B = z.data("ajaxSettings");
            if (typeof(B) != "object" || typeof(B.url) == "undefined") {
                alert("Invalid calendar event settings");
                return false
            }
            var A = {
                year: y,
                month: (C + 1)
            };
            jQuery.ajax({
                type: "GET",
                url: B.url,
                data: A,
                dataType: "json"
            }).done(function(D) {
                var E = [];
                jQuery.each(D, function(G, F) {
                    E.push(D[G])
                });
                z.data("events", E);
                f(z, "ajax")
            });
            return true
        }

        function f(B, A) {
            var z = B.data("jsonData");
            var C = B.data("ajaxSettings");
            var y = B.data("events");
            if (y !== false) {
                jQuery(y).each(function(H, J) {
                    var D = B.attr("id") + "_" + J.date;
                    var F = jQuery("#" + D);
                    var K = jQuery("#" + D + "_day");
                    F.data("hasEvent", true);
                    if (typeof(J.title) !== "undefined") {
                        F.attr("title", J.title)
                    }
                    if (typeof(J.classname) === "undefined") {
                        F.addClass("event")
                    } else {
                        F.addClass("event-styled");
                        K.addClass(J.classname)
                    }
                    if (typeof(J.badge) !== "undefined" && J.badge !== false) {
                        var E = (J.badge === true) ? "" : " badge-" + J.badge;
                        var G = K.data("day");
                        K.html('<span class="badge badge-event' + E + '">' + G + "</span>")
                    }
                    if (typeof(J.body) !== "undefined") {
                        var I = false;
                        if (A === "json" && typeof(J.modal) !== "undefined" && J.modal === true) {
                            I = true
                        } else {
                            if (A === "ajax" && "modal" in C && C.modal === true) {
                                I = true
                            }
                        }
                        if (I === true) {
                            F.addClass("event-clickable");
                            var L = h(D, J.title, J.body, J.footer);
                            jQuery("body").append(L);
                            jQuery("#" + D).click(function() {
                                jQuery("#" + D + "_modal").modal()
                            })
                        }
                    }
                })
            }
        }

        function x(A, B, z) {
            var C = new Date();
            var y = new Date(A, B, z);
            return (y.toDateString() == C.toDateString())
        }
		
		function xxx(A, B, z, PP) {
			
            var selecttodayObj = new Date(A, B, PP);
			
            var dateObj = new Date(A, B, z);
            return (dateObj.toDateString() == selecttodayObj.toDateString());
        }

        function k(z, A, y) {
            d = (y < 10) ? "0" + y : y;
            m = A + 1;
            m = (m < 10) ? "0" + m : m;
            return z + "-" + m + "-" + d
        }

        function i(A, B, z) {
            var y = new Date(A, B, z, 0, 0, 0, 0);
            var C = y.getDay();
            if (C == 0) {
                C = 6
            } else {
                C--
            }
            return C
        }

        function o(z, A) {
            var y = 28;
            while (v(z, A + 1, y + 1)) {
                y++
            }
            return y
        }

        function t(A, C) {
            var y = o(A, C);
            var E = i(A, C, 1);
            var B = i(A, C, y);
            var D = y;
            var z = (E - B);
            if (z > 0) {
                D += z
            }
            return Math.ceil(D / 7)
        }

        function v(B, z, A) {
            return z > 0 && z < 13 && B > 0 && B < 32768 && A > 0 && A <= (new Date(B, z, 0)).getDate()
        }

        function p(A, C) {
            if (A === false) {
                A = 0
            }
            var B = j.data("currDate");
            var z = j.data("initDate");
            var y;
            y = (z.getFullYear() - B.getFullYear()) * 12;
            y -= B.getMonth() + 1;
            y += z.getMonth();
            if (C === true) {
                if (y < (parseInt(A) - 1)) {
                    return true
                }
            } else {
                if (y >= (0 - parseInt(A))) {
                    return true
                }
            }
            return false
        }
    });
    return this
};
jQuery.fn.zabuto_calendar_defaults = function() {
	var a = new Date();
    var c = a.getFullYear();
    var e = a.getMonth() + 1;
    var b = {
        language: false,
        year: c,
        month: e,
        show_previous: true,
        show_next: true,
        cell_border: false,
        today: false,
        show_days: true,
        weekstartson: 1,
        nav_icon: false,
        data: false,
		date: '',
		mode:'add',
		daynum:'',
		selectedday:'',
        ajax: false,
        legend: false,
        action: false,
        action_nav: false,
		datearr: datearr,
		bookedarr: bookedarr,
		allocatedarr: allocatedarr,
		disabledates: disabledates,
    };
    return b
};
jQuery.fn.zabuto_calendar_language = function(a) {
    if (typeof(a) == "undefined" || a === false) {
        a = "en"
    }
    switch (a.toLowerCase()) {
        case "de":
            return {
                month_labels: ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"],
                dow_labels: ["Mo", "Di", "Mi", "Do", "Fr", "Sa", "So"]
            };
            break;
        case "en":
            return {
                month_labels: monthlabels,
                dow_labels: dowlabels
            };
            break;
        case 'ar':
            return {
                month_labels: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
                dow_labels: ["أثنين", "ثلاثاء", "اربعاء", "خميس", "جمعه", "سبت", "أحد"]
            };
            break;
        case "es":
            return {
                month_labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                dow_labels: ["Lu", "Ma", "Mi", "Ju", "Vi", "Sá", "Do"]
            };
            break;
        case "fr":
            return {
                month_labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
                dow_labels: ["Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"]
            };
            break;
        case "it":
            return {
                month_labels: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
                dow_labels: ["Lun", "Mar", "Mer", "Gio", "Ven", "Sab", "Dom"]
            };
            break;
        case "nl":
            return {
                month_labels: ["Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December"],
                dow_labels: ["Ma", "Di", "Wo", "Do", "Vr", "Za", "Zo"]
            };
            break;
        case "pt":
            return {
                month_labels: ["Janeiro", "Fevereiro", "Marco", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                dow_labels: ["S", "T", "Q", "Q", "S", "S", "D"]
            };
            break;
        case "ru":
            return {
                month_labels: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
                dow_labels: ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вск"]
            };
            break;
        case "se":
            return {
                month_labels: ["Januari", "Februari", "Mars", "April", "Maj", "Juni", "Juli", "Augusti", "September", "Oktober", "November", "December"],
                dow_labels: ["Mån", "Tis", "Ons", "Tor", "Fre", "Lör", "Sön"]
            };
            break;
        case "tr":
            return {
                month_labels: ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"],
                dow_labels: ["Pts", "Salı", "Çar", "Per", "Cuma", "Cts", "Paz"]
            };
            break
    }
};
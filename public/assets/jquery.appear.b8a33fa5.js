(function(e){e.fn.appear=function(t,c){var r=e.extend({data:void 0,one:!0,accX:0,accY:0},c);return this.each(function(){var a=e(this);if(a.appeared=!1,!t){a.trigger("appear",r.data);return}var n=e(window),p=function(){if(!a.is(":visible")){a.appeared=!1;return}var i=n.scrollLeft(),s=n.scrollTop(),o=a.offset(),l=o.left,u=o.top,h=r.accX,d=r.accY,v=a.height(),g=n.height(),m=a.width(),w=n.width();u+v+d>=s&&u<=s+g+d&&l+m+h>=i&&l<=i+w+h?a.appeared||a.trigger("appear",r.data):a.appeared=!1},f=function(){if(a.appeared=!0,r.one){n.unbind("scroll",p);var i=e.inArray(p,e.fn.appear.checks);i>=0&&e.fn.appear.checks.splice(i,1)}t.apply(this,arguments)};r.one?a.one("appear",r.data,f):a.bind("appear",r.data,f),n.scroll(p),e.fn.appear.checks.push(p),p()})},e.extend(e.fn.appear,{checks:[],timeout:null,checkAll:function(){var t=e.fn.appear.checks.length;if(t>0)for(;t--;)e.fn.appear.checks[t]()},run:function(){e.fn.appear.timeout&&clearTimeout(e.fn.appear.timeout),e.fn.appear.timeout=setTimeout(e.fn.appear.checkAll,20)}}),e.each(["append","prepend","after","before","attr","removeAttr","addClass","removeClass","toggleClass","remove","css","show","hide"],function(t,c){var r=e.fn[c];r&&(e.fn[c]=function(){var a=r.apply(this,arguments);return e.fn.appear.run(),a})})})(jQuery);

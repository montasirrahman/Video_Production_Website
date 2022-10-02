			function w3_open() {
              document.getElementById("mySidebar").style.display = "block";
              document.getElementById("myOverlay").style.display = "block";
            }
            
            function w3_close() {
              document.getElementById("mySidebar").style.display = "none";
              document.getElementById("myOverlay").style.display = "none";
            }
            $(window).on('load', function () {
              $("#cover").fadeOut(1750);
             });
			 
			 
			 const cursor = document.querySelector('.cursor');

        document.addEventListener('mousemove', e => {
            cursor.setAttribute("style", "top: "+(e.pageY - 10)+"px; left: "+(e.pageX - 10)+"px;")
        })

        document.addEventListener('click', () => {
            cursor.classList.add("expand");

            setTimeout(() => {
                cursor.classList.remove("expand");
            }, 500)
        });


        var menuBtn = $('.messenger-btn'),
        menu    = $('.messenger-links');
    menuBtn.on('click', function() {
        if ( menu.hasClass('show') ) {
            menu.removeClass('show');
        } else {
            menu.addClass('show');
        }
    });
    $(document).mouseup(function (e){ 
      var div = $('.messenger'); 
      if (!div.is(e.target) 
          && div.has(e.target).length === 0) {
        $('.messenger-links').removeClass('show');
      }
    });



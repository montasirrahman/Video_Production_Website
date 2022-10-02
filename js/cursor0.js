const cursor_0 = document.querySelector('.cursor_0');

        document.addEventListener('mousemove', e => {
            cursor_0.setAttribute("style", "top: "+(e.pageY - 10)+"px; left: "+(e.pageX - 10)+"px;")
        })

        document.addEventListener('click', () => {
            cursor_0.classList.add("expand");

            setTimeout(() => {
                cursor_0.classList.remove("expand");
            }, 500)
        });
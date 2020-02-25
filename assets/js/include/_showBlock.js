(function() {

    let btn = document.querySelector('.block_btn');


    btn.onclick = function() {

        let block = document.querySelector('.block_hidden');
        let opened = document.querySelector('.opened');


        console.log(block)

        if (opened == null) {
            block.classList.add('opened')
        } else  {
            block.classList.remove('opened');
        }
    }

})()
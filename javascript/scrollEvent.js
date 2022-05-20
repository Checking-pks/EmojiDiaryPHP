window.addEventListener('scroll',  function(){    //스크롤시 이벤트가 실행된다.
    let value = window.scrollY;    //세로 스크롤 값을 value 함수에 저장한다.

    let header = document.getElementsByClassName('header')[0];
    
    if (value > 0) {
        header.style.position = 'fixed';
        header.style.top = 0;
        header.style.left = 0;
    } else {
        header.style.position = '';
    }
})
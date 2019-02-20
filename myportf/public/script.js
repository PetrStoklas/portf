const backfin = document.querySelector('#backfin');
const whole = document.querySelector('.shrk');
const btn = document.querySelector('.submit-btn');
let contacts = document.querySelector('.contact');
const success = document.getElementById('success');




const swim = () => {
    backfin.classList.add('backfinswing');
}

const stopswim = () => {
    backfin.classList.remove('backfinswing');
}


whole.addEventListener('mouseenter', swim);
whole.addEventListener('mouseleave', stopswim);


window.addEventListener('scroll', () => { 
    let offset = window.pageYOffset;
    if (offset > 800) {
        contacts.classList.add('scrolled');
    } 
})

btn.addEventListener('click', (e) => {
    btn.style.color = 'white';
    // e.preventDefault();
    //kokos

    // console.log('TIMEOUT STARTS')
    // setTimeout(function(){
    //     if (success != null) {
    //         console.log('IF STARTS')
    //         success.style.backgroundColor = 'red';
    //         success.style.display = 'none';
    //     }
        
    //     console.log('IF FINISH')
    //     /* or
    //     var item = document.getElementById('info-message')
    //     item.parentNode.removeChild(item); 
    //     */
    //   }, 3000);



})

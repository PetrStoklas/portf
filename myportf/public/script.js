const backfin = document.querySelector('#backfin');
const whole = document.querySelector('.shrk');
let contacts = document.querySelector('.contact');
console.log(contacts.classList);



const swim = () => {
    backfin.classList.add('backfinswing');
    console.log('mouseentered');
}

const stopswim = () => {
    backfin.classList.remove('backfinswing');
    console.log('mouseleft');
}


whole.addEventListener('mouseenter', swim);
whole.addEventListener('mouseleave', stopswim);


window.addEventListener('scroll', () => { 
    let offset = window.pageYOffset;
    if (offset > 800) {
        contacts.classList.add('scrolled');
        console.log(contacts.classList);
    } })
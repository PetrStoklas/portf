const backfin = document.querySelector('#backfin');
const whole = document.querySelector('.shrk');



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
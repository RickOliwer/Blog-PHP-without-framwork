function scrollAppear(){


    let product = document.querySelectorAll('.post-card');
    let screenPosition = window.innerHeight;
    let interval = 150;
    product.forEach((products, index) =>{
        
        let productPosition = products.getBoundingClientRect().top;

        setTimeout(function (){


            if(productPosition < screenPosition) {
                products.classList.add('post-card-appear');
            
            }
        }, index * interval);
        
        
    });

}

window.addEventListener('scroll',scrollAppear);
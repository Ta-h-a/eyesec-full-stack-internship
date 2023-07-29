
const letters = ['a','b','c','d','e','g']

const keyboardLetters = ['q','w','e','r','t','y','u','i','o','p','a','s']

let count = 0

for (letter of letters){
    for(let i=0;i<2;i++){
        console.log(letter+i);
        clickEvent(letter,i)
    }
}

$(".f0").on("click",function(){
    const audio = new Audio("/media/f0.wav")
    audio.play()
})

// $(".g0").on("click",function(){
//     const audio = new Audio("/media/g0.wav")
//     audio.play()
// })

/** */

// --------------------------

function clickEvent(letter,i)
{
    $("."+letter+i).on("click",function(){
        const audio = new Audio("/media/"+letter+i+".wav")
        audio.play()
    })
}


$(document).on("keypress",function(){
    let key = event.key
    let audio;


    switch(key){

    case "q":
        $(".key.a0").addClass('black-key-active')
        
        setTimeout(()=>{
            $(".key.a0").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/a0.wav")
        break;
    
    case "w":
        $(".key.b0").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.b0").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/b0.wav")
        break;
    
    case "e":
        $(".key.c0").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.c0").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/c0.wav")
        break;
    
    case "r":
        $(".key.d0").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.d0").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/d0.wav")
        break;
    
    case "t":
        $(".key.e0").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.e0").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/e0.wav")
        break;
    
    case "y":
        $(".key.f0").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.f0").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/f0.wav")
        break;
    
    case "u":
        $(".key.g1").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.g1").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/g1.wav")
        break;
    
    case "i":
        $(".key.a1").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.a1").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/a1.wav")
        break;
    
    case "o":
        $(".key.b1").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.b1").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/b1.wav")
        break;
    
    case "p":
        $(".key.c1").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.c1").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/c1.wav")
        break;
    
    case "a":
        $(".key.d1").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.d1").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/d1.wav")
        break;
    case "s":
        $(".key.e1").addClass('black-key-active')
        setTimeout(()=>{
            $(".key.e1").removeClass('black-key-active')
        },200)
        audio = new Audio("/media/e1.wav")
        break;
    }



    if(keyboardLetters.includes(event.key)){
        audio.play();
    }

    
    
})


document.querySelectorAll(".like").forEach(like => {
    like.addEventListener("click", function(){
        console.log('clk')
        like.classList.toggle("red")
    })
})
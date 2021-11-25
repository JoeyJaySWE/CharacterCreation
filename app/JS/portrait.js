if(page === portraitPage){
    console.log("Listening to Portrait page...");

    let imgBtn = document.querySelector('figure button');
    let avatar = document.querySelector('figure img');
    let hiddenLnk = document.querySelector('figure input[type=hidden]');

    // let paste = navigator.clipboard.readText();

    imgBtn.addEventListener('click', () => {
     let avatarLnk = prompt("Plase input your link to your image bellow: ", avatar.src);
    avatar.src = avatarLnk;
    hiddenLnk.value = avatarLnk;
    })
    console.log("Finished Portrait");
}
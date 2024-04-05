const carousel = document.querySelector(".sliderclient");
const firstcardwidth = carousel.querySelector(".clientopinion").offsetwidth;
 let isDragging = false;
 let startX, startscrollLeft,timeoutid;

const dragstart = (e) => {
    isDragging = true;
    carousel.classList.add("dragging")
    startX = e.pageX;
    startscrollLeft = carousel.scrollLeft;
}
const dragstop = () => {
    isDragging=false;
    carousel.classList.remove("dragging")
}

const dragging = (e) => {
    if(!isDragging) return;
    carousel.scrollLeft = startscrollLeft - (e.pageX - startX);
}
const autoplay = () => {
    timeoutid = setTimeout(() => carousel.scrollLeft += firstcardwidth, 1000);
}
carousel.addEventListener("mousemove",dragging);
carousel.addEventListener("mousedown",dragstart);
document.addEventListener("mouseup",dragstop);
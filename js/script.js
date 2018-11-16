var src = 'http://vtrahevip.tv/uploads/posts/2018-11/1542234229_2292.jpg'
var href = 'http://vtrahevip.tv/2018/11/15/dryannaya-devchonka-susy-gala-vereschala-kak-oslica-kogda-ee-dral-nacho-vidal.html'
var site = 1;
function addVideo(src, href, site) {
var newel = document.createElement('li');
var sil = document.createElement('a');
var imgfo = document.createElement('img');
sil.appendChild(imgfo);
newel.appendChild(sil);
var dob = document.getElementsByTagName('ul')[site];
dob.appendChild(newel);
sil.setAttribute('href', href);
sil.setAttribute('target', 'blank');
imgfo.setAttribute('src', src);
console.log(src);
}
//addVideo(src, href, site);
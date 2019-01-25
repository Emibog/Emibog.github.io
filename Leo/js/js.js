var img1, img2, img3, img4, information;
a1 = document.getElementsByTagName("a")[1];
a2 = document.getElementsByTagName("a")[2];
a3 = document.getElementsByTagName("a")[3];
a4 = document.getElementsByTagName("a")[4];
information = document.getElementsByClassName("inform")[0];

var text1, text2, text3, text4;

text1 = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
text2 = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s."
text3 = "In quis ligula ac elit maximus ullamcorper. Duis sed dolor sed dolor hendrerit tincidunt sit amet eget purus. Maecenas non fermentum erat. Quisque vitae rhoncus sem. Curabitur nunc ex, mollis sed augue vel, laoreet tincidunt justo. Integer nunc diam, vestibulum et justo sollicitudin, sagittis pretium orci. Vivamus a porta risus, sit amet fringilla tellus. Sed placerat, elit eget consectetur gravida, turpis turpis fermentum mi, vel iaculis lacus risus at magna. Sed eget tempus mi. Mauris in ligula a neque blandit laoreet. Donec in odio ornare mauris tincidunt rhoncus."
text4 = "Vestibulum non dui ut lectus aliquet porttitor non eget elit. Proin a massa malesuada, dictum ipsum sit amet, scelerisque nisi. Maecenas sed condimentum ipsum, ac malesuada justo. Fusce eget finibus dolor. Donec aliquam dui sed neque tincidunt lobortis ut sit amet tellus. Aenean eget consectetur orci, eu imperdiet dui. Vestibulum semper accumsan purus vel pellentesque."

function change (text, information) {
	event.preventDefault();
	information.textContent = text;
}

a1.addEventListener("click", function(){ change(text1, information); }, false);
a2.addEventListener("click", function(){ change(text2, information); }, false);
a3.addEventListener("click", function(){ change(text3, information); }, false);
a4.addEventListener("click", function(){ change(text4, information); }, false);
var firebaseConfig = {
    apiKey: "AIzaSyBnVrURV0ch2SkI7jlMQ20d5nOIhn5A3xc",
    authDomain: "penscomp-ufrn.firebaseapp.com",
    databaseURL: "https://penscomp-ufrn.firebaseio.com",
    projectId: "penscomp-ufrn",
    storageBucket: "penscomp-ufrn.appspot.com",
    messagingSenderId: "1000000944631",
    appId: "1:1000000944631:web:267549075224bec26556f2"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

function slide_up (state) {
    if (state == true) {
        document.getElementById("signin").classList.add("slide-up");
        document.getElementById("signup").classList.remove("slide-up");
    } else {
        document.getElementById("signup").classList.add("slide-up");
        document.getElementById("signin").classList.remove("slide-up");
    }
}

function login () {
    email = document.getElementById("login-email").value;
    password = document.getElementById("login-password").value;

    firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        alert(errorMessage);
    });
      
};

firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
      // User is signed in.
      var displayName = user.displayName;
      var email = user.email;
      var emailVerified = user.emailVerified;
      var photoURL = user.photoURL;
      var isAnonymous = user.isAnonymous;
      var uid = user.uid;
      var providerData = user.providerData;
      window.location.href = '../php/panel.php';
      // ...
    } else {
      // User is signed out.
      // ...
    }
  });
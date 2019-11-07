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
//firebase.initializeApp(firebaseConfig);

function logout () {
    firebase.auth().signOut().then(function() {
        // Sign-out successful.
        window.location.href='/home';
      }).catch(function(error) {
        // An error happened.
        console.log(error);
      });
}
window.dataLayer = window.dataLayer || [];

function gtag(){
  dataLayer.push(arguments);
}

gtag('js', new Date());

// "UA-"" need to be change here and in "wp-child/src/actions.php"
gtag('config', 'UA-XXXXXXXXX-Y');

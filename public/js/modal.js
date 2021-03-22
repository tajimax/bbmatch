
(()=>{

    // 新規登録モーダルを表示
    const $signup_show = document.getElementById('signup-show');
    const $signup_modal = document.getElementById('signup-modal');
    
    $signup_show.addEventListener('click', function() {
      $signup_modal.classList.add('active');
    })
    

    // ログインモーダルを表示
    const $login_show = document.getElementById('login-show');
    const $login_modal = document.getElementById('login-modal');
    
    $login_show.addEventListener('click', function() {
      $login_modal.classList.add('active');
    })


    // 新規登録モーダルを閉じる
    const $closeSignup = document.getElementById('close-signup-modal');

    $closeSignup.addEventListener('click', function() {
      $signup_modal.classList.remove('active');
    })


    // ログインモーダルを閉じる
    const $closeLogin = document.getElementById('close-login-modal');

    $closeLogin.addEventListener('click', function() {
      $login_modal.classList.remove('active');
    })
})();
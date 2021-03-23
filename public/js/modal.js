
(()=>{

    // 新規登録モーダルを表示
    const $opponent_recruit_show = document.getElementById('opponent_recruit-show');
    const $opponent_recruit_modal = document.getElementById('opponent_recruit-modal');
    
    $opponent_recruit_show.addEventListener('click', function() {
      $opponent_recruit_modal.classList.add('active');
    })


    // 新規登録モーダルを閉じる
    const $closeOpponent_recruit = document.getElementById('close-opponent_recruit-modal');

    $closeOpponent_recruit.addEventListener('click', function() {
      $opponent_recruit_modal.classList.remove('active');
    })
    

    // ログインモーダルを表示
    const $helper_recruit_show = document.getElementById('helper_recruit-show');
    const $helper_recruit_modal = document.getElementById('helper_recruit-modal');
    
    $helper_recruit_show.addEventListener('click', function() {
      $helper_recruit_modal.classList.add('active');
    })


    // ログインモーダルを閉じる
    const $closeHelper_recruit = document.getElementById('close-helper_recruit-modal');

    $closeHelper_recruit.addEventListener('click', function() {
      $helper_recruit_modal.classList.remove('active');
    })
})();
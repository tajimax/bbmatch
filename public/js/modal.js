
(()=>{

    // 新規登録モーダルを表示
    const $recruit_show = document.getElementById('recruit-show');
    const $recruit_modal = document.getElementById('recruit-modal');
    
    $recruit_show.addEventListener('click', function() {
      $recruit_modal.classList.add('active');
    })


    // 新規登録モーダルを閉じる
    const $close_recruit = document.getElementById('close-recruit-modal');

    $close_recruit.addEventListener('click', function() {
      $recruit_modal.classList.remove('active');
    })
})();
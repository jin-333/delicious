/*global fetch*/
document.addEventListener('DOMContentLoaded', () => {
 const commentBtns = document.getElementsByClassName('comment-submit-btn');
 const commentBtn = Array.from(commentBtns)[0]
 commentBtn.addEventListener('click', async (e) => {
  const commentList = document.getElementById('comments-list');
  const postId = e.target.id
  const commentContent = document.getElementById("comment-content").value
  const res = await fetch("/posts/comments", {
   method: 'POST',
   headers: {
     'X-Requested-With': 'XMLHttpRequest',
     'Content-Type': 'application/json',
     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
   },
   body: JSON.stringify({
    post_id: postId,
    comment: commentContent
   })
  })
  .then((res) => res.json())
  .then((data) => {
   let div_element = document.createElement('div');
   div_element.textContent = '投稿者:'
   let strong_element = document.createElement('strong')
   strong_element.textContent = data.user_name
   div_element.appendChild(strong_element)
   let p_element = document.createElement('p')
   p_element.textContent = data.comment_contents
   let small_element = document.createElement('small')
   small_element.textContent = data.created_at
   
  commentList.prepend(div_element, p_element, small_element) 
  })
 })
})
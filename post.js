const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const postId = urlParams.get('id');

async function getPostData() {
    let responsePost;
    let post;

    try {
        responsePost = await fetch('https://jsonplaceholder.typicode.com/posts/' + postId);
        post = await responsePost.json();
    } catch (e) {
        console.log(e);
        return;
    }

    const element = `
        <div>
            <div><b>Post id:</b> ${post.id}</div>
            <div><b>Post title:</b> ${post.title}</div>
            <div><b>Post body:</b> ${post.body}</div>
        </div>
    `;

    document.querySelector('.post').innerHTML = element;



    let responseComments;
    let comments;

    try {
        responseComments = await fetch('https://jsonplaceholder.typicode.com/posts/' + post.id + '/comments');
        comments = await responseComments.json();
    } catch (e) {
        console.log(e);
        return;
    }


    let commentsHTML = ``;

    comments.forEach(comment => {
        commentsHTML += `
            <div>
                <div><b>Cooment Id:</b> ${comment.id}</div>
                <div><b>Comment name:</b> ${comment.name}</div>
                <div><b>Comment email:</b> ${comment.email}</div>
                <div><b>Comment body:</b> ${comment.body}</div>
                <br>
            </div>
        `;
    });

    document.querySelector('.comments').innerHTML = commentsHTML;
}

getPostData();
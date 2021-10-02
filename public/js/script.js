// const visual = document.getElementById("");
// visual.style.display = "none";

// bladeからanswerのidを受け取っている
const displayBtn = (answer_id) => {
    const visual = document.getElementById(answer_id);
    // console.log(visual);
    if (visual.style.display == "none") {
        visual.style.display = "block";
    } else {
        visual.style.display = "none";
    }
};

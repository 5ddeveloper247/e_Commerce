// Helper function to calculate average rating
function calculateAvgRating(ratings) {
    if (!ratings || ratings.length === 0) {
        return 0;
    }
    const total = ratings.reduce((acc, curr) => acc + curr.rating, 0);
    return (total / ratings.length).toFixed(1);
}


function renderStars(avgRating, totalStars = 5) {

    let starsHtml = '';
    for (let i = 0; i < totalStars; i++) {
        if (i < Math.floor(avgRating)) {
            // Fully filled star
            starsHtml += `<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#FFD700" d="M12 2l2.17 6.16H21l-4.93 3.58 1.88 6.11L12 14.79 6.05 17.85l1.88-6.11L3 8.16h6.83L12 2z"></path></svg>`;
        } else if (i === Math.floor(avgRating) && avgRating % 1 !== 0) {
            // Half star
            starsHtml += `<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#ddd" d="M12 2l2.17 6.16H21l-4.93 3.58 1.88 6.11L12 14.79 6.05 17.85l1.88-6.11L3 8.16h6.83L12 2z"></path><path fill="#FFD700" d="M12 2l-2.17 6.16H3l4.93 3.58-1.88 6.11L12 14.79V2z"></path></svg>`;
        }
        else {
            // Empty star
            console.log("f3")
            starsHtml += `<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#ddd" d="M12 2l2.17 6.16H21l-4.93 3.58 1.88 6.11L12 14.79 6.05 17.85l1.88-6.11L3 8.16h6.83L12 2z"></path></svg>`;
        }
    }

    return starsHtml;
}

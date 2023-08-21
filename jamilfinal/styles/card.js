function showCard(cardNumber) {
    var cards = document.getElementsByClassName("card");
    for (var i = 0; i < cards.length; i++) {
      cards[i].classList.remove("active");
    }
    document.getElementById("card" + cardNumber).classList.add("active");
  }
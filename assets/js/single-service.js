document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('.faq_question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const faqIndex = this.getAttribute('data-faq');
            const answer = document.getElementById(`faq-${faqIndex}`);
            
            // Toggle active class
            this.classList.toggle('active');
            answer.classList.toggle('active');
            
            // Close other open FAQs
            faqQuestions.forEach(otherQuestion => {
                if (otherQuestion !== this) {
                    const otherIndex = otherQuestion.getAttribute('data-faq');
                    const otherAnswer = document.getElementById(`faq-${otherIndex}`);
                    otherQuestion.classList.remove('active');
                    otherAnswer.classList.remove('active');
                }
            });
        });
    });
});
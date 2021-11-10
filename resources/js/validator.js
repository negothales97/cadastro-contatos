import Bouncer from 'formbouncerjs';

var validate = new Bouncer('#contactForm', {
    messages: {
        missingValue: {
            default: 'Campo obrigatório.'
        },
    }
});

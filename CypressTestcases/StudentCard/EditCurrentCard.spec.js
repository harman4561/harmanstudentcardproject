describe('This is my first Cypress test', () => {
    Cypress.Cookies.debug(true)

    it('Openining Student Portal', () => {
        cy.visit('http://localhost/StudentCard/index.php')
        
    });

    it('Check Element should be Visble', () => {
        cy.get('.active > .nav-link > .menu-title').should('exist')
        cy.get(':nth-child(2) > .nav-link > .menu-title').should('exist')

    });
    
    it('Checking Card show', () => {
        cy.get(':nth-child(1) > :nth-child(8) > .badge-primary > .mdi').should('exist')
        cy.get('.even > :nth-child(8) > .badge-success > .mdi').should('exist')

        cy.get('.even > :nth-child(8) > .badge-success > .mdi').click()
        cy.get('#first_name').clear()
        cy.get('#first_name').type('Harcharan Singh')


        cy.get('#middle_name').should('exist')
        cy.get('#middle_name').clear()
        cy.get('#middle_name').type('G')

        cy.get('#last_name').should('exist')
        cy.get('#last_name').clear()
        cy.get('#last_name').type('Gill')

        cy.get('#emailID').should('exist')
        cy.get('#emailID').clear()
        cy.get('#emailID').type('harsingh@algomau.ca')

        cy.get('#student_number').should('exist')
        cy.get('#student_number').clear()
        cy.get('#student_number').type('19958451151')

        cy.get('#insurance_number').should('exist')
        cy.get('#insurance_number').clear()
        cy.get('#insurance_number').type('1845151544')

        cy.get('.mr-2').should('exist')
        cy.get('.mr-2').click()

    });
})
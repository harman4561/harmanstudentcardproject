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
        cy.get(':nth-child(1) > :nth-child(8) > .badge-primary > .mdi').click()
        cy.get('.user-card').should('exist')
        cy.get('.general').should('exist')
    });
})
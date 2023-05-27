import './Navigation.css';

import React from "react";
import {Container, Nav, Navbar, NavDropdown} from "react-bootstrap";

export const Navigation = props => {

    return (
        <Navbar bg="light" expand="lg" className={"navigation"}>
            <Container>
                <Navbar.Brand href="/">CRM</Navbar.Brand>
                <Navbar.Toggle aria-controls="basic-navbar-nav" />
                <Navbar.Collapse id="basic-navbar-nav">
                    <Nav className="me-auto">
                        <NavDropdown title="Lead" id="basic-nav-dropdown">
                            <NavDropdown.Item href="/lead/new">New</NavDropdown.Item>
                            <NavDropdown.Item href="/lead/list">List</NavDropdown.Item>
                        </NavDropdown>
                    </Nav>
                </Navbar.Collapse>
            </Container>
        </Navbar>
    )
}
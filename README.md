# OpenID Connect Authentication with Keycloak

The implementation will consist of creating a Laravel application that uses Keycloak as the IDP for user login and logout.

## User Flow
- User opens the Laravel application.
- If no login access token is found, the user is redirected to Keycloak to log in.
- After a successful login, the user is redirected to the Laravel application, and their name and email are displayed alongside a logout button.
- If the logout button is clicked, the login session should be destroyed.

## Notes
- The access token should be checked for validity in Keycloak.
- Minimal focus on the UI of the Laravel application is needed; the default Welcome page can be used.

## Keycloak Details
- **Hostname**: https://bws.auth.bw-devops.com/
- **REALM**: demo-oidc
- **Client ID**: openid-connect-php
- **Client Secret**: FBJjqws6TC3MZDODYUIZ8qzpRNr0Ot1W

## User Account
- **Username**: kelvin.gjikola
- **Password**: A)z1YY.Feb2GhFJ/DUOp{13>l5^9oF

## Keycloak Account Dashboard
- https://bws.auth.bw-devops.com/realms/demo-oidc/account

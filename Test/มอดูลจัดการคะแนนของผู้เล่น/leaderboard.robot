# มอดูลจัดการคะแนนของผู้เล่น
*** Settings ***
Library     Selenium2Library

*** Variables ***
${url}                                https://localhost/gami_ossd/index.php
${login_input_username}               xpath=//*[@id="inputEmail"]
${login_input_password}               xpath=//*[@id="inputPassword"]
${login_btn}                          xpath=//*[@id="loginForm"]/button

*** Keywords ***
Open web browser
    Open Browser  ${url}     chrome
    Maximize Browser Window

Login with "${username}" "${password}"
    Click Element       xpath=//*[@id="details-button"]
    Click Element       xpath=//*[@id="proceed-link"]
    Input Text          ${login_input_username}        ${username}
    Input Password      ${login_input_password}     ${password}
    Click Element       ${login_btn}

Go to leaderboard page
    Go To       https://localhost/gami_ossd/index.php/leaderboard

Check page "${text}"
    Wait Until Page Contains     ${text}


*** Test Cases ***
SCM-Report-TC1-01
    [Documentation]     การแสดงประวัติกิจกรรมถูกต้อง
    [Tags]    PASS
    GIVEN Open web browser
    WHEN Login with "59160161" "59160161"
    AND Go to leaderboard page
    THEN Check page "Open Source Software Developers"
    [Teardown]    Close Browser
# มอดูลแสดงประวัติกิจกรรม
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
    sleep                       1s
    Click Element       ${login_btn}

Go to report page
    Go To       https://localhost/gami_ossd/index.php/Source_manager/index/ActivityReport

Choose year "${year}"
    sleep                       1s
    Select From List By Value       xpath=//*[@id="select-opt"]   ${year}

Check page ${text}
    sleep                       1s
    Wait Until Page Contains     ${text}

Check no page ${text}
    Wait Until Page Does Not Contain     ${text}


*** Test Cases ***
SCM-Report-TC1-01
    [Documentation]     การแสดงประวัติกิจกรรมถูกต้องผู้ใช้งานที่เป็น Scrum master
    [Tags]    PASS
    GIVEN Open web browser
    WHEN Login with "59160161" "59160161"
    AND Go to report page
    THEN Choose year "2564"
    [Teardown]    Close Browser

SCM-Report-TC1-02
    [Documentation]     การแสดงประวัติกิจกรรมถูกต้องผู้ใช้งานที่เป็นพี่เลี้ยง
    [Tags]    PASS
    GIVEN Open web browser
    WHEN Login with "60160350" "60160350"
    AND Go to report page
    THEN Check no page "Activity Report"
    [Teardown]    Close Browser

SCM-Report-TC1-03
    [Documentation]     การแสดงประวัติกิจกรรมถูกต้องผู้ใช้งานที่เป็นผู้เล่น
    [Tags]    PASS
    GIVEN Open web browser
    WHEN Login with "62160324" "62160324"
    AND Go to report page
    THEN Check no page "Activity Report"
    [Teardown]    Close Browser
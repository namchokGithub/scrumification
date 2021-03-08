# มอดูลจัดการกิจกรรม
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

Go to work management page
    Go To       https://localhost/gami_ossd/index.php/Source_manager/index/Work

Add work
    Click Element       xpath=//*[@id="example_wrapper"]/div[1]/button[1]
    sleep               1s

Input name work "${name}"
    Input Text  xpath=//*[@id="name"]   ${name}
    sleep                       1s

Submit add work
    Click Element       xpath=//*[@id="addRowBtn"]
    sleep   1s

Edit work
    sleep                       1s
    Click Element       xpath=//*[@id="example"]/tbody/tr[1]
    sleep                       1s
    Click Element       xpath=//*[@id="example_wrapper"]/div[1]/button[2]
    sleep                       1s

Delete work
    sleep                       1s
    Click Element       xpath=//*[@id="example"]/tbody/tr[1]
    sleep                       1s
    Click Element       xpath=//*[@id="example_wrapper"]/div[1]/button[3]
    sleep                       1s

Submit edit work
    Click Element       xpath=//*[@id="editRowBtn"]

Submit delete work
    Click Element       xpath=//*[@id="deleteRowBtn"]

*** Test Cases ***
SCM-Work-TC1-01
    [Documentation]     การเพิ่มกิจกรรม
    [Tags]    PASS
    GIVEN Open web browser
    WHEN Login with "59160161" "59160161"
    AND Go to work management page
    AND Add work
    AND Input name work "New work"
    THEN Submit add work
    [Teardown]    Close Browser

SCM-Work-TC1-02
    [Documentation]     การแก้ไขกิจกรรม
    [Tags]    PASS
    GIVEN Open web browser
    WHEN Login with "59160161" "59160161"
    AND Go to work management page
    AND Edit work
    AND Input name work "New work XeditX"
    THEN Submit edit work
    [Teardown]    Close Browser

SCM-Work-TC1-03
    [Documentation]     การลบกิจกรรม
    [Tags]    PASS
    GIVEN Open web browser
    WHEN Login with "59160161" "59160161"
    AND Go to work management page
    AND Delete work
    THEN Submit delete work
    [Teardown]    Close Browser
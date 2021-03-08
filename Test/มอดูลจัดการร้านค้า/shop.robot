# มอดูลจัดการร้านค้า
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

Go to shop management page
    Go To       https://localhost/gami_ossd/index.php/Source_manager/index/Shop

Add shop
    Click Element       xpath=//*[@id="example_wrapper"]/div[1]/button[1]
    sleep               1s

Input name shop "${name}"
    Input Text  xpath=//*[@id="name"]   ${name}
    sleep                       1s

Input point shop "${point}"
    Input Text  xpath=//*[@id="point"]   ${point}
    sleep                       1s

Input type shop "${type}"
    Select From List By Value       xpath=//*[@id="type"]   ${type}
    sleep                       1s

Input total shop "${total}"
    Input Text  xpath=//*[@id="total"]   ${total}
    sleep                       1s

Input date start shop "${ds}"
    Input Text  xpath=//*[@id="time_start"]   ${ds}
    sleep                       1s

Input date end shop "${dn}"
    Input Text  xpath=//*[@id="time_end"]   ${dn}
    sleep                       1s

Submit add shop
    Click Element       xpath=//*[@id="addRowBtn"]
    sleep   1s

Edit shop
    sleep                       1s
    Click Element       xpath=//*[@id="example"]/tbody/tr[9]
    sleep                       1s
    Click Element       xpath=//*[@id="example_wrapper"]/div[1]/button[2]
    sleep                       1s

Delete shop
    sleep                       1s
    Click Element       xpath=//*[@id="example"]/tbody/tr[9]
    sleep                       1s
    Click Element       xpath=//*[@id="example_wrapper"]/div[1]/button[3]
    sleep                       1s

Submit edit shop
    Click Element       xpath=//*[@id="editRowBtn"]

Submit delete shop
    Click Element       xpath=//*[@id="deleteRowBtn"]

*** Test Cases ***
SCM-Shop-TC1-01
    [Documentation]     การเพิ่มไอเทมพิเศษ
    [Tags]    PASS
    GIVEN Open web browser
    WHEN Login with "59160161" "59160161"
    AND Go to shop management page
    AND Add shop
    AND Input name shop "ไอเทมพิเศษ"
    AND Input point shop "10"
    AND Input type shop "1"
    AND Input total shop "10"
    AND Input date start shop "2021/03/08 16:26"
    AND Input date end shop "2022/03/08 16:26"
    THEN Submit add shop
    [Teardown]    Close Browser

SCM-Shop-TC1-02
    [Documentation]     การแก้ไขไอเทมพิเศษ
    [Tags]    PASS
    GIVEN Open web browser
    WHEN Login with "59160161" "59160161"
    AND Go to shop management page
    AND Edit shop
    AND Input name shop "ไอเทมพิเศษ"
    AND Input point shop "10"
    AND Input type shop "1"
    AND Input total shop "10"
    AND Input date start shop "2021/03/08 16:26"
    AND Input date end shop "2022/03/08 16:26"
    THEN Submit edit shop
    [Teardown]    Close Browser

SCM-Shop-TC1-03
    [Documentation]     การลบไอเทมพิเศษ
    [Tags]    PASS
    GIVEN Open web browser
    WHEN Login with "59160161" "59160161"
    AND Go to shop management page
    AND Delete shop
    THEN Submit delete shop
    [Teardown]    Close Browser
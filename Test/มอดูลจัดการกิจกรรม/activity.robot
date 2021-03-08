# มอดูลจัดการกิจกรรม
*** Settings ***
Library     Selenium2Library

*** Variables ***
${url}                                http://localhost/gami_ossd/
${login_input_username}               xpath=//*[@id="inputEmail"]
${login_input_password}               xpath=//*[@id="inputPassword"]
${login_btn}                          xpath=//*[@id="loginForm"]/button


*** Keywords ***
Open web browser
    Open Browser  ${url}     chrome
    Maximize Browser Window

Login with "${username}" "${password}"
    Input Text          ${login_input_username}        ${username}
    Input Password      ${login_input_password}     ${password}
    sleep                       1s
    Click Element       ${login_btn}
    Click Element       xpath=//*[@id="details-button"]
    Click Element       xpath=//*[@id="proceed-link"]

Go to activity page
    Go To       https://localhost/gami_ossd/index.php/Source_manager/index/Activity

Add activity
    Click Element       xpath=/html/body/div[1]/div[2]/section[2]/div/div[2]/div/div[1]/button[1]
    sleep                       1s

Input name activity "${name}"
    Input Text  xpath=//*[@id="name"]   ${name}
    sleep                       1s
    
Input time start activity "${ts}"
    Input Text  xpath=//*[@id="time_start"]   ${ts}
    sleep                       1s
    
Input time end activity "${tn}"
    Input Text  xpath=//*[@id="time_end"]   ${tn}
    sleep                       1s
    
Input date start activity "${ds}"
    Input Text  xpath=//*[@id="date_start"]   ${ds}
    sleep                       1s
    
Input date end activity "${dn}"
    Input Text  xpath=//*[@id="date_end"]   ${dn}
    sleep                       1s

Submit add activity
    Click Element       xpath=//*[@id="addRowBtn"]
    sleep   1s

Edit activity
    sleep                       1s
    Click Element       xpath=//*[@id="example"]/tbody/tr[2]
    sleep                       1s
    Click Element       xpath=//*[@id="example_wrapper"]/div[1]/button[2]
    sleep                       1s

Delete activity
    sleep                       1s
    Click Element       xpath=//*[@id="example"]/tbody/tr[2]
    sleep                       1s
    Click Element       xpath=//*[@id="example_wrapper"]/div[1]/button[3]
    sleep                       1s

Submit edit activity
    Click Element       xpath=//*[@id="editRowBtn"]

Submit delete activity
    Click Element       xpath=//*[@id="deleteRowBtn"]

*** Test Cases ***
SCM-activity-TC1-01
    [Documentation]     การเพิ่มกิจกรรม
    [Tags]    PASS
    GIVEN Open web browser
    WHEN Login with "59160161" "59160161"
    AND Go to activity page
    AND Add activity
    AND Input name activity "New activity"
    AND Input time start activity "07:00"
    AND Input time end activity "09:00"
    AND Input date start activity "2020/01/03"
    AND Input date end activity "2021/01/03"
    THEN Submit add activity
    [Teardown]    Close Browser

SCM-activity-TC1-02
    [Documentation]     การแก้ไขกิจกรรม
    [Tags]    PASS
    GIVEN Open web browser
    WHEN Login with "59160161" "59160161"
    AND Go to activity page
    AND Edit activity
    AND Input name activity "New activity"
    AND Input time start activity "07:00"
    AND Input time end activity "09:00"
    AND Input date start activity "2020/01/03"
    AND Input date end activity "2021/01/03"
    THEN Submit edit activity
    [Teardown]    Close Browser

SCM-activity-TC1-03
    [Documentation]     การลบกิจกรรม
    [Tags]    PASS
    GIVEN Open web browser
    WHEN Login with "59160161" "59160161"
    AND Go to activity page
    AND Delete activity
    THEN Submit delete activity
    [Teardown]    Close Browser
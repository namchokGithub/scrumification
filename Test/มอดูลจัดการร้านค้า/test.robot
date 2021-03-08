# มอดูลแก้ไขข้อมูลส่วนตัว
*** Settings ***
Library     Selenium2Library

*** Variables ***
${ums_url}                          https://localhost:44346/
${ums_editprofile_url}              https://localhost:44346/EditProfile/Index/adminidtempfortestsystem2020
${ums_login_input_email}            xpath=//*[@id="acc_Email"]
${ums_login_input_password}         xpath=//*[@id="acc_Password"]
${ums_btn_login}                    xpath=//*[@id="account"]/div[3]/div[2]/button
${editprofile_input_name}           xpath=//*[@id="acc_Fname"]            
${editprofile_input_lastname}       xpath=//*[@id="acc_Lname"]
${editprofile_input_curpass}        xpath=//*[@id="acc_Current"]
${editprofile_input_newpass}        xpath=//*[@id="acc_New"]
${editprofile_input_confirmpass}    xpath=//*[@id="acc_Con"]
${editprofile_btn_notsavepass}      xpath=//*[@id="btn_NotSavePassword"]
${editprofile_btn_savepass}         xpath=//*[@id="btn_SavePassword"]
${editprofile_btn_save}             xpath=//*[@id="btn_SaveProfile"]
${editprofile_changepass}           xpath=//*[@id="href_ChangePassword"]
${btn_edit_profile}                 xpath=/html/body/div/aside/div/nav/ul/li[2]/a

*** Keywords ***
Open web browser
    Open Browser  ${ums_url}     chrome
    Maximize Browser Window

Login with "${username}" "${password}"
    Input Text          ${ums_login_input_email}        ${username}
    Input Password      ${ums_login_input_password}     ${password}
    sleep                       1s
    Click Element       ${ums_btn_login}

Fill firstname "${firstname}"
    Input Text      ${editprofile_input_name}    ${firstname}


Fill confirmpass "${confirmpass}"
    Input Password      ${editprofile_input_confirmpass}    ${confirmpass}

Change password
    Click Element       ${editprofile_changepass}
    sleep                1s

The alert message must say "${message}"
    Wait Until Page Contains    ${message}

*** Test Cases ***
# UMS-EditProfile-01 แก้ไขชื่อและนามสกุล
UMS-EditProfile-01-01
    [Documentation]     กรอกชื่อจริงและนามสกุลถูกต้อง
    [Tags]    PASS
    GIVEN Open web browser
    WHEN Login with "usermanagement2020@gmail.com" "123qweQ!"
    AND Go to Edit profile
    AND Fill firstname "Namchok"
    AND Fill lastname "Singhachai"
    AND Save profile
    THEN The alert message must say "Edit profile successfully!"
    [Teardown]    Close Browser
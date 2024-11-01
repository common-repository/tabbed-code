jQuery( document ).ready( function() {
	var tabGroups = document.getElementsByClassName("tc_tab_group");

	for(var i = 0; i < tabGroups.length; i++) {
	    var group = tabGroups.item(i);
        var tabGroupList = document.getElementById(group.dataset.tabGroupId + "-list");

        var tabs = group.getElementsByClassName("tc_tab");

        for(var j = 0; j < tabs.length; j++) {
            var listEle = document.createElement("li");

            var linkEle = document.createElement("a");

            var lang = tabs.item(j).dataset.tabLang;
            if (lang === "nohighlight") {
                lang = "text";
            }
            var linkText = document.createTextNode(lang.toUpperCase());

            linkEle.appendChild(linkText);
            linkEle.href = "#" + tabs.item(j).dataset.tabId;

            listEle.appendChild(linkEle);
            tabGroupList.appendChild(listEle);
        }

        jQuery( "#" + group.dataset.tabGroupId ).tabs();
    }
});
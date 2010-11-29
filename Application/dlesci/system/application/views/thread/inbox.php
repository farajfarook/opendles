<table>
<tr>
    <td valign="top">
        <input type="button" class="profile_button" value="new thread" onclick="loadPage('thread/newform', 'newthreadform')"/>
    <div class="thread_inbox_container" id="thread_inbox_container">
        <script>
        loadPage('thread/inboxlist', 'thread_inbox_container');
        </script>
    </div>
</td>
<td valign="top">
    <div id="newthreadform">
        <script>
        loadPage('thread/newform', 'newthreadform');
        </script>
    </div>
</td>
</tr>
</table>
<strong><?php $clang->eT("Question group"); ?></strong>&nbsp;
<span class='basic'><?php echo $grow['group_name']; ?> (<?php $clang->eT("ID"); ?>:<?php echo $gid; ?>)</span>
</div>
<div class='menubar-main'>
    <div class='menubar-left'>

        <img src='<?php echo $imageurl; ?>blank.gif' alt='' width='54' height='20'  />

        <?php if(hasSurveyPermission($surveyid,'surveycontent','update'))
            { ?>
            <img src='<?php echo $imageurl; ?>seperator.gif' alt=''  />
            <a href="<?php echo $this->createUrl("survey/index/action/previewgroup/sid/$surveyid/gid/$gid/"); ?>" target="_blank">
                <img src='<?php echo $imageurl; ?>preview.png' alt='<?php $clang->eT("Preview current question group"); ?>' width="<?php echo $iIconSize;?>" height="<?php echo $iIconSize;?>"/></a>
            <?php }
            else{ ?>
            <img src='<?php echo $imageurl; ?>seperator.gif' alt=''  />
            <?php } ?>

        <?php if(hasSurveyPermission($surveyid,'surveycontent','update'))
            { ?>
            <img src='<?php echo $imageurl; ?>seperator.gif' alt=''  />
            <a href="<?php echo $this->createUrl('admin/questiongroup/edit/surveyid/'.$surveyid.'/gid/'.$gid); ?>"
                title="<?php $clang->eTview("Edit current question group"); ?>">
                <img src='<?php echo $imageurl; ?>edit.png' alt='<?php $clang->eT("Edit current question group"); ?>' width="<?php echo $iIconSize;?>" height="<?php echo $iIconSize;?>"/></a>
            <?php } ?>

        <?php if(hasSurveyPermission($surveyid,'surveyactivation','read'))
            { ?>
            <img src='<?php echo $imageurl; ?>seperator.gif' alt=''  />
            <a href="<?php echo $this->createUrl("admin/expressions/survey_logic_file/sid/{$surveyid}/gid/{$gid}/"); ?>"
                title="<?php $clang->eTview("Survey logic file for current question group"); ?>">
                <img src='<?php echo $imageurl; ?>quality_assurance.png' alt='<?php $clang->eT("Survey logic file for current question group"); ?>' /></a>
            <?php } ?>

        <?php
            if (hasSurveyPermission($surveyid,'surveycontent','delete'))
            {
                if ((($sumcount4 == 0 && $activated != "Y") || $activated != "Y"))
                {
                    if (is_null($condarray))
                    { ?>

                    <a href='#' onclick="if (confirm('<?php $clang->eT("Deleting this group will also delete any questions and answers it contains. Are you sure you want to continue?","js"); ?>')) { window.open('<?php echo $this->createUrl("admin/questiongroup/delete/surveyid/$surveyid/gid/$gid"); ?>','_top'); }"
                        title="<?php $clang->eTview("Delete current question group"); ?>">
                        <img src='<?php echo $imageurl; ?>delete.png' alt='<?php $clang->eT("Delete current question group"); ?>' title='' width="<?php echo $iIconSize;?>" height="<?php echo $iIconSize;?>"/></a>

                    <?php }
                    else
                    // TMSW Conditions->Relevance:  Should be allowed to delete group even if there are conditions/relevance, since separate view will show exceptions

                    { ?>
                    <a href='<?php echo $this->createUrl("admin/questiongroup/view/surveyid/$surveyid/gid/$gid"); ?>' onclick="alert('<?php $clang->eT("Impossible to delete this group because there is at least one question having a condition on its content","js"); ?>')"
                        title="<?php $clang->eTview("Delete current question group"); ?>">
                        <img src='<?php echo $imageurl; ?>delete_disabled.png' alt='<?php $clang->eT("Delete current question group"); ?>' width="<?php echo $iIconSize;?>" height="<?php echo $iIconSize;?>"/></a>
                    <?php }
                }
                else
                { ?>
                <img src='<?php echo $imageurl; ?>blank.gif' alt='' width='40' />
                <?php }
            }
            if(hasSurveyPermission($surveyid,'surveycontent','export'))
            { ?>

            <a href='<?php echo $this->createUrl("admin/export/group/surveyid/$surveyid/gid/$gid");?>' title="<?php $clang->eTview("Export this question group"); ?>" >
                <img src='<?php echo $imageurl; ?>dumpgroup.png' title='' alt='<?php $clang->eT("Export this question group"); ?>' width="<?php echo $iIconSize;?>" height="<?php echo $iIconSize;?>"/></a>
            <?php } ?>
    </div>
    <div class='menubar-right'>
        <label for="questionid"><?php $clang->eT("Questions:"); ?></label> <select class="listboxquestions" name='questionid' id='questionid'
            onchange="window.open(this.options[this.selectedIndex].value, '_top')">

            <?php echo getQuestions($surveyid,$gid,$qid); ?>
        </select>




        <span class='arrow-wrapper'>
            <?php if ($QidPrev != "")
                { ?>

                <a href='<?php echo $this->createUrl("admin/survey/view/surveyid/".$surveyid."/gid/".$gid."/qid/".$QidPrev); ?>'>
                    <img src='<?php echo $imageurl; ?>previous_20.png' title='' alt='<?php $clang->eT("Previous question"); ?>'/></a>
                <?php }
                else
                { ?>

                <img src='<?php echo $imageurl; ?>previous_disabled_20.png' title='' alt='<?php $clang->eT("No previous question"); ?>'/>
                <?php } ?>



            <?php if ($QidNext != "")
                { ?>

                <a href='<?php echo $this->createUrl("admin/survey/view/surveyid/".$surveyid."/gid/".$gid."/qid/".$QidNext); ?>'>
                    <img src='<?php echo $imageurl; ?>next_20.png' title='' alt='<?php $clang->eT("Next question"); ?>'/> </a>
                <?php }
                else
                { ?>

                <img src='<?php echo $imageurl; ?>next_disabled_20.png' title='' alt='<?php $clang->eT("No next question"); ?>'/>
                <?php } ?>
        </span>

        <?php if ($activated == "Y")
            { ?>
            <a href='#'>
                <img src='<?php echo $imageurl; ?>add_disabled.png' title='' alt='<?php echo $clang->gT("Disabled").' - '.$clang->gT("This survey is currently active."); ?>' width="<?php echo $iIconSize;?>" height="<?php echo $iIconSize;?>" /></a>
            <?php }
            elseif(hasSurveyPermission($surveyid,'surveycontent','create'))
            { ?>
            <a href='<?php echo $this->createUrl("admin/question/addquestion/surveyid/".$surveyid."/gid/".$gid); ?>'
                title="<?php $clang->eTview("Add new question to group"); ?>" >
                <img src='<?php echo $imageurl; ?>add.png' title='' alt='<?php $clang->eT("Add new question to group"); ?>' width="<?php echo $iIconSize;?>" height="<?php echo $iIconSize;?>" /></a>
            <?php } ?>

        <img src='<?php echo $imageurl; ?>seperator.gif' alt=''  />

        <img src='<?php echo $imageurl; ?>blank.gif' width='18' alt='' />
        <input id='MinimizeGroupWindow' type='image' src='<?php echo $imageurl; ?>minimize.png' title='<?php $clang->eT("Hide details of this group"); ?>' alt='<?php $clang->eT("Hide details of this group"); ?>' />
        <input type='image' id='MaximizeGroupWindow' src='<?php echo $imageurl; ?>maximize.png' title='<?php $clang->eT("Show details of this group"); ?>' alt='<?php $clang->eT("Show details of this group"); ?>' />
        <?php if (!$qid)
            { ?>
            <input type='image' src='<?php echo $imageurl; ?>close.png' title='<?php $clang->eT("Close this group"); ?>' alt='<?php $clang->eT("Close this group"); ?>'
                onclick="window.open('<?php echo $this->createUrl("admin/survey/view/surveyid/".$surveyid); ?>','_top');" />
            <?php }
            else
            { ?>
            <img src='<?php echo $imageurl; ?>blank.gif' alt='' width='18' />
            <?php } ?>
    </div></div>
</div>




<table id='groupdetails' <?php echo $gshowstyle; ?> >
<tr ><td ><strong>
            <?php $clang->eT("Title"); ?>:</strong></td>
    <td>
        <?php echo $grow['group_name']; ?> (<?php echo $grow['gid']; ?>)</td>
</tr>
<tr>
    <td><strong>
        <?php $clang->eT("Description:"); ?></strong>
    </td>
    <td>
        <?php if (trim($grow['description'])!='') {
                templatereplace($grow['description']);
                echo LimeExpressionManager::GetLastPrettyPrintExpression();
        } ?>
    </td>
</tr>
<?php if (trim($grow['grelevance'])!='') { ?>
    <tr>
        <td><strong>
            <?php $clang->eT("Relevance:"); ?></strong>
        </td>
        <td>
            <?php
                templatereplace('{' . $grow['grelevance'] . '}');
                echo LimeExpressionManager::GetLastPrettyPrintExpression();
            ?>
        </td>
    </tr>
    <?php } ?>
<?php
    if (trim($grow['randomization_group'])!='')
    {?>
    <tr>
        <td><?php $clang->eT("Randomization group:"); ?></td><td><?php echo $grow['randomization_group'];?></td>
    </tr>
    <?php
    }
    // TMSW Conditions->Relevance:  Use relevance equation or different EM query to show dependencies
    if (!is_null($condarray))
    { ?>
    <tr><td><strong>
                <?php $clang->eT("Questions with conditions to this group"); ?>:</strong></td>
        <td>
            <?php foreach ($condarray[$gid] as $depgid => $deprow)
                {
                    foreach ($deprow['conditions'] as $depqid => $depcid)
                    {

                        $listcid=implode("-",$depcid);?>
                    <a href='<?php echo $this->createUrl("admin/conditions/markcid/" . implode("-",$depcid) . "/surveyid/$surveyid/gid/$depgid/qid/$depqid"); ?>'>[QID: <?php echo $depqid; ?>]</a>
                    <?php }
            } ?>
        </td></tr>
    <?php } ?>